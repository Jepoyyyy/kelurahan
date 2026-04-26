<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';

    protected $fillable = [
        'nama',
        'tanggal',
        'jenis',
        'lokasi'
    ];
    protected $casts = [
        'tanggal' => 'date',
    ];
    public function getWeekGroupAttribute(): string
    {
        $date  = Carbon::parse($this->tanggal);
        $start = $date->copy()->startOfWeek(Carbon::MONDAY);
        $end   = $date->copy()->endOfWeek(Carbon::SUNDAY);

        $startMonth = $start->translatedFormat('M'); // "Apr"
        $endMonth   = $end->translatedFormat('M');

        if ($startMonth === $endMonth) {
            // Dalam satu bulan: "21—27 Apr"
            return $start->format('j') . '—' . $end->format('j') . ' ' . $endMonth;
        }

        // Lintas bulan: "28 Apr—4 Mei"
        return $start->format('j') . ' ' . $startMonth . '—' . $end->format('j') . ' ' . $endMonth;
    }

    /**
     * Label relatif untuk header grup minggu.
     * "Minggu ini" / "Minggu depan" / "2 minggu lagi" / fallback ke range tanggal.
     */
    public function getWeekLabelAttribute(): string
    {
        $date       = Carbon::parse($this->tanggal);
        $thisMonday = Carbon::now()->startOfWeek(Carbon::MONDAY);
        $diff       = (int) $thisMonday->diffInWeeks($date->copy()->startOfWeek(Carbon::MONDAY), false);

        return match (true) {
            $diff === 0 => 'Minggu ini',
            $diff === 1 => 'Minggu depan',
            $diff >= 2  => $diff . ' minggu lagi',
            default     => $this->week_group, // fallback (tidak seharusnya terjadi di landing)
        };
    }

    /**
     * Nama hari pendek dalam bahasa Indonesia.
     * Carbon::setLocale('id') harus dipanggil di AppServiceProvider.
     * Fallback manual jika locale belum diset.
     */
    public function getDayNameAttribute(): string
    {
        $map = [
            'Monday'    => 'Sen',
            'Tuesday'   => 'Sel',
            'Wednesday' => 'Rab',
            'Thursday'  => 'Kam',
            'Friday'    => 'Jum',
            'Saturday'  => 'Sab',
            'Sunday'    => 'Min',
        ];

        return $map[Carbon::parse($this->tanggal)->englishDayOfWeek] ?? '—';
    }

    /**
     * Angka tanggal zero-padded. Contoh: "01", "22".
     */
    public function getDayNumAttribute(): string
    {
        return Carbon::parse($this->tanggal)->format('d');
    }

    /**
     * Nama bulan pendek bahasa Indonesia. Contoh: "Apr", "Mei".
     */
    public function getMonthShortAttribute(): string
    {
        $map = [
            1  => 'Jan', 2  => 'Feb', 3  => 'Mar',
            4  => 'Apr', 5  => 'Mei', 6  => 'Jun',
            7  => 'Jul', 8  => 'Agt', 9  => 'Sep',
            10 => 'Okt', 11 => 'Nov', 12 => 'Des',
        ];

        return $map[(int) Carbon::parse($this->tanggal)->format('n')];
    }

    /**
     * True jika event terjadi hari ini.
     * Dipakai di Blade: @if($event->is_today) class="ev is-today" @endif
     */
    public function getIsTodayAttribute(): bool
    {
        return Carbon::parse($this->tanggal)->isToday();
    }

    /**
     * CSS class suffix untuk badge jenis.
     * Nilai kolom `jenis` di DB → class CSS.
     *
     * Nilai yang diharapkan di DB (disarankan enum):
     *   rapat | sosial | administrasi | kesehatan | olahraga | lainnya
     */
    public function getJenisClassAttribute(): string
    {
        return match (strtolower($this->jenis ?? '')) {
            'rapat'         => 'rapat',
            'sosial'        => 'sosial',
            'administrasi'  => 'adm',
            'kesehatan'     => 'kesehatan',
            'olahraga'      => 'olahraga',
            default         => 'lainnya',
        };
    }

    /**
     * Label tampilan badge. Administrasi dipersingkat agar badge tidak terlalu lebar.
     */
    public function getJenisLabelAttribute(): string
    {
        return match (strtolower($this->jenis ?? '')) {
            'rapat'         => 'Rapat',
            'sosial'        => 'Sosial',
            'administrasi'  => 'Administrasi',
            'kesehatan'     => 'Kesehatan',
            'olahraga'      => 'Olahraga',
            default         => 'Lainnya',
        };
    }

    /**
     * Tanggal format panjang untuk keperluan lain (detail page, tooltip, dsb).
     * Contoh: "Selasa, 22 April 2025"
     */
    public function getFormattedDateAttribute(): string
    {
        $days = [
            'Monday' => 'Senin', 'Tuesday' => 'Selasa', 'Wednesday' => 'Rabu',
            'Thursday' => 'Kamis', 'Friday' => 'Jumat', 'Saturday' => 'Sabtu', 'Sunday' => 'Minggu',
        ];
        $months = [
            1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
            5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
            9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
        ];

        $date = Carbon::parse($this->tanggal);

        return $days[$date->englishDayOfWeek]
            . ', ' . $date->format('j')
            . ' ' . $months[(int) $date->format('n')]
            . ' ' . $date->format('Y');
    }

}
