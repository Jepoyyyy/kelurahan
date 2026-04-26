<?php

namespace App\Http\Controllers;
use App\Models\news;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Event;
use App\Models\PageVisit;
use App\Models\InnovationUpdate;
use App\Models\Innovation;
use Illuminate\Support\Collection;

class LandingController extends Controller
{

//  getKalenderSection()
//
//  Mengambil max 8 event mendatang dalam rentang 3 minggu,
//  di-groupBy week_group, dengan metadata footer.
//
//  Return ke view:
//    $groupedEvents  — Collection of Collections (per grup minggu)
//    $kalenderMeta   — array info footer
// ─────────────────────────────────────────────────────────────

private function getKalenderSection(): array
{
    $today    = Carbon::today();
    $maxWeeks = 3;
    $maxItems = 8;

    // 1. Ambil semua event dalam rentang 3 minggu ke depan
    $all = Event::where('tanggal', '>=', $today)
        ->where('tanggal', '<=', $today->copy()->addWeeks($maxWeeks)->endOfWeek(Carbon::SUNDAY))
        ->orderBy('tanggal')
        ->get();

    // 2. Potong ke max 8 untuk ditampilkan di landing
    $shown    = $all->take($maxItems);
    $total    = $all->count();
    $remaining = max(0, $total - $maxItems);

    // 3. groupBy week_group — hasilkan Collection of Collections
    //    Key = "21—27 Apr", value = Collection<Event>
    $groupedEvents = $shown->groupBy('week_group');

    // 4. Tentukan minggu mana saja yang perlu ditampilkan (termasuk yang kosong)
    //    Agar empty week tetap render, bangun skeleton 3 minggu dulu
    //    lalu merge dengan hasil groupBy.
    $weekSkeleton = collect();
    for ($i = 0; $i < $maxWeeks; $i++) {
        $start = $today->copy()->addWeeks($i)->startOfWeek(Carbon::MONDAY);
        $end   = $start->copy()->endOfWeek(Carbon::SUNDAY);

        $startM = $start->format('M'); // English abbr — kita pakai key string langsung
        // Buat key sama persis dengan accessor week_group
        $startMonth = self::monthShort((int) $start->format('n'));
        $endMonth   = self::monthShort((int) $end->format('n'));

        $key = ($startMonth === $endMonth)
            ? $start->format('j') . '—' . $end->format('j') . ' ' . $endMonth
            : $start->format('j') . ' ' . $startMonth . '—' . $end->format('j') . ' ' . $endMonth;

        // Label relatif
        $label = match ($i) {
            0       => 'Minggu ini',
            1       => 'Minggu depan',
            default => $i . ' minggu lagi',
        };

        $weekSkeleton->put($key, [
            'label'  => $label,
            'events' => $groupedEvents->get($key, collect()),
        ]);
    }

    // 5. Cari minggu terakhir yang mengandung event terpotong (untuk footer note)
    $lastShownWeekKey   = $shown->last()?->week_group;
    $remainingThisWeek  = 0;

    if ($remaining > 0 && $lastShownWeekKey) {
        // Hitung event di minggu yang sama yang tidak masuk $shown
        $remainingThisWeek = $all
            ->skip($maxItems)
            ->where('week_group', $lastShownWeekKey)
            ->count();
    }

    return [
        'groupedEvents' => $weekSkeleton,
        'kalenderMeta'  => [
            'total'              => $total,
            'shown'              => $shown->count(),
            'remaining'          => $remaining,
            'remaining_this_week'=> $remainingThisWeek,
            'last_shown_week'    => $lastShownWeekKey,
        ],
    ];
}

/**
 * Helper statis — bulan pendek ID.
 * Duplikasi dari accessor Event, tapi controller tidak boleh instansiasi model
 * hanya untuk format string. Jadikan helper atau pindahkan ke Str macro jika perlu.
 */
private static function monthShort(int $n): string
{
    return [
        1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
        5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agt',
        9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des',
    ][$n];
}
    private function mapBerita($item): array
{
    return [
        'kategori' => 'berita',
        'tanggal'  => $item->formatted_date,
        'judul'    => $item->title,
        'excerpt'  => $item->excerpt,
        'url'      => '#', // ganti dengan route('berita.show', $item->id) saat route sudah ada
    ];
}

/**
 * Normalisasi satu item InnovationUpdate ke shape standar
 */
private function mapInovasi($item): array
{
    return [
        'kategori' => 'inovasi',
        'tanggal'  => $item->formatted_date,
        'judul'    => $item->title,
        'excerpt'  => $item->excerpt,
        'url'      => '#', // ganti dengan route + anchor saat route sudah ada
    ];
}
private function getSemuaList(): Collection
{
    $berita = News::latest()->take(10)->get()->map(fn($i) => $this->mapBerita($i));
    $inovasi = InnovationUpdate::with('innovation')
        ->latest('activity_date')
        ->take(10)
        ->get()
        ->map(fn($i) => $this->mapInovasi($i));

    return $berita
        ->concat($inovasi)
        ->sortByDesc('tanggal')
        ->values()
        ->take(5);
}
private function getBeritaList(): Collection
{
    return News::latest()
        ->take(5)
        ->get()
        ->map(fn($i) => $this->mapBerita($i))
        ->values();
}
private function getInovasiList(): Collection
{
    return InnovationUpdate::with('innovation')
        ->latest('activity_date')
        ->take(5)
        ->get()
        ->map(fn($i) => $this->mapInovasi($i))
        ->values();
}
    public function index(){
    Carbon::setLocale('id');

    $visit = PageVisit::firstOrCreate(
        ['page' => 'landing'],
        ['views' => 0]
    );

    if (!session()->has('visited_landing')) {
        $visit->increment('views');
        session()->put('visited_landing', true);
    }

    // ✅ Ambil sekali, select kolom yang dibutuhkan saja
    $allEvents = Event::select('nama', 'tanggal', 'jenis', 'lokasi')
        ->orderBy('tanggal', 'asc')
        ->get();

    // ✅ Map untuk kalender dari koleksi yang sama
    $events = $allEvents->map(function($event) {
        return [
            'title' => $event->nama,
            'start' => Carbon::parse($event->tanggal)->format('Y-m-d'),
            'color' => match($event->jenis) {
                'rt'        => '#3B82F6',
                'kecamatan' => '#F59E0B',
                'kelurahan' => '#10B981',
                default     => '#6B7280',
            },
            'extendedProps' => [
                'description' => $event->lokasi,
                'category'    => $event->jenis,
            ]
        ];
    });

    // ✅ Filter upcoming dari koleksi yang sama, tidak query ulang
    $upcomingEvents = $allEvents
        ->filter(fn($event) => $event->tanggal >= now()->toDateString())
        ->take(10)
        ->map(function($event) {
            $event->formatted_date = $event->tanggal->translatedFormat('d F Y');
            return $event;
        })
        ->values();

    // ✅ News tetap sama, sudah efisien
    $newsList = News::latest()->take(5)->get()->map(function($news) {
    $news->formatted_date = $news->created_at?->translatedFormat('d F Y');
    return $news;
});

// Highlighted: views terbanyak, fallback ke terbaru jika semua 0
$highlighted = News::orderByDesc('views')->latest()->first();
// Highlighted: views terbanyak, fallback ke terbaru jika semua 0
$highlighted = News::orderByDesc('views')->latest()->first();

if ($highlighted) {
    $highlighted->formatted_date = $highlighted->created_at?->translatedFormat('d F Y');
}

// List: exclude highlighted jika ada
$newsList = News::when($highlighted, fn($q) => $q->where('id', '!=', $highlighted->id))
    ->latest()
    ->take(10)
    ->get()
    ->map(function($news) {
        $news->formatted_date = $news->created_at?->translatedFormat('d F Y');
        return $news;
    });
    $carouselUpdates = InnovationUpdate::with([
    'innovation',
    'media' => function($q) {
        $q->where('file_type', 'image')->orderBy('id', 'asc')->limit(1);
    }
])
->whereHas('innovation') // sekarang pakai foreign key yang benar
->latest()
->take(5)
->get();


    $beritaData = [
         'semua'  => $this->getSemuaList(),
         'berita' => $this->getBeritaList(),
         'inovasi' => $this->getInovasiList(),
     ];

    $footer = config('footer.list');
    $layanan = config('layanan.list');
    $kalenderData = $this->getKalenderSection();

    return view('landing', [
    'newsList'       => $newsList,
    'events'         => $events,
    'upcomingEvents' => $upcomingEvents,
    'highlighted'    => $highlighted,
    'carouselUpdates'=> $carouselUpdates,
    'layanan'        => $layanan,
    'footer'         => $footer,
    'beritaData'     => $beritaData,
    'groupedEvents'  => $kalenderData['groupedEvents'],
    'kalenderMeta'   => $kalenderData['kalenderMeta'],
    'views'          => $visit->views,
]);
}
}
