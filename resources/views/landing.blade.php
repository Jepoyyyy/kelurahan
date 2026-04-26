<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelurahan Simpang III Sipin</title>

    @vite(['resources/css/app.css', 'resources/js/alpine.js', 'resources/js/calendar.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bungee&display=swap" rel="stylesheet">
</head>
<script>
    window.calendarEvents = @json($events);
</script>

<body>
    <div class="wrapper min-h-screen w-full ">
        <x-navbar />
        <section
    x-data="{
        open: false,
        query: '',
        results: [],
        loading: false,
        init() {
    this.$watch('open', val => {
        if (val) {
            document.body.classList.add('overflow-hidden')
            this.$nextTick(() => this.$refs.searchInput.focus())
        } else {
            document.body.classList.remove('overflow-hidden')
            this.query = ''
            this.results = []
        }
    })
},
        async search() {
            if (this.query.length < 2) {
                this.results = []
                return
            }
            this.loading = true
            try {
                const res = await fetch(`/api/search?q=${encodeURIComponent(this.query)}`)
                this.results = await res.json()
            } catch(e) {
                this.results = []
            } finally {
                this.loading = false
            }
        }
    }"
    class="relative min-h-screen flex items-center justify-center text-center overflow-hidden">

    <!-- BACKGROUND -->
    <img src="/hero.png" class="absolute inset-0 w-full h-full object-cover">

    <!-- OVERLAY DARK -->
    <div class="absolute inset-0 bg-black/70"></div>

    <!-- CONTENT -->
    <div class="relative z-10 px-6 max-w-3xl text-white">

        <!-- BADGE -->
        <div class="mb-4">
            <span class="text-xs tracking-widest uppercase text-white/60">
                Website Resmi
            </span>
        </div>

        <!-- TITLE -->
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight leading-tight">
            Pusat Informasi<br class="hidden md:block">
            Simpang III Sipin
        </h1>

        <!-- DESC -->
        <p class="mt-5 text-white/80 max-w-xl mx-auto text-sm md:text-base leading-relaxed">
            Akses layanan publik, informasi kegiatan, dan perkembangan kelurahan secara cepat,
            transparan, dan terintegrasi dalam satu platform.
        </p>

        <!-- SEARCH TRIGGER -->
        <div class="mt-6 max-w-md mx-auto">
            <input
                @click="open = true"
                type="text"
                placeholder="Cari layanan atau informasi..."
                readonly
                class="w-full px-4 py-3 rounded-lg bg-white/10 border border-white/20
                       text-white placeholder-white/50 backdrop-blur-sm
                       focus:outline-none focus:ring-2 focus:ring-white/40 cursor-pointer">
        </div>

        <!-- CTA -->
        <div class="mt-6 flex justify-center gap-3 flex-wrap">
            <a href="{{ url()->current() }}#service"
                class="px-6 py-3 border border-white/40 text-white rounded-lg
                       hover:bg-white/10 transition">
                Lihat Layanan
            </a>
            <a href="{{ url()->current() }}#informasi"
                class="px-6 py-3 border border-white/40 text-white rounded-lg
                       hover:bg-white/10 transition">
                Lihat Informasi
            </a>
        </div>

    </div>

    <!-- SEARCH OVERLAY -->
    <div
        x-show="open"
        x-transition.opacity
        class="fixed inset-0 bg-black/60 z-50 flex items-start justify-center pt-32"
        @keydown.escape.window="open = false"
        style="display: none;">

        <!-- BACKDROP -->
        <div class="absolute inset-0" @click="open = false"></div>

        <!-- BOX -->
        <div
            @click.stop
            class="relative w-full max-w-xl bg-white rounded-2xl shadow-2xl p-4 mx-5 md:m-0">

            <!-- INPUT -->
            <div class="relative">
                <input
                    x-ref="searchInput"
                    x-model="query"
                    @input.debounce.300ms="search()"
                    @keydown.escape="open = false"
                    type="text"
                    placeholder="Cari layanan, berita, atau halaman..."
                    class="w-full px-4 py-3 pr-10 rounded-lg border border-gray-300
                           focus:outline-none focus:ring-2 focus:ring-blue-500 text-black">

                <!-- LOADING SPINNER -->
                <div x-show="loading" class="absolute right-3 top-3.5">
                    <svg class="animate-spin h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"/>
                    </svg>
                </div>
            </div>

            <!-- RESULTS -->
            <div class="mt-3 max-h-72 overflow-y-auto divide-y divide-gray-100">

                <!-- PLACEHOLDER -->
                <div
                    x-show="query.length < 2 && !loading"
                    class="py-4 text-left text-sm text-gray-400">
                    Mulai ketik untuk mencari...
                </div>

                <!-- EMPTY STATE -->
                <div
                    x-show="!loading && query.length >= 2 && results.length === 0"
                    class="py-6 text-center text-sm text-gray-400">
                    Tidak ada hasil untuk "<span x-text="query" class="font-medium text-gray-600"></span>"
                </div>
                <!-- RESULT ITEMS -->
<template x-for="(item, index) in results" :key="index">
    <div class="border-b border-gray-100 last:border-0">
        <a :href="item.url"
           class="flex items-center gap-3 px-2 py-3 hover:bg-gray-50 rounded-lg transition">

            <span class="shrink-0 text-xs font-medium px-2 py-1 rounded-full bg-blue-100 text-blue-600"
                  x-text="item.type"></span>

            <div class="flex-1 overflow-hidden text-left">
                <p class="text-sm font-semibold text-gray-800 truncate" x-text="item.title"></p>
                <p class="text-xs text-gray-400 truncate" x-text="item.subtitle"></p>
            </div>

        </a>
    </div>
</template>
            </div>

        </div>
    </div>

</section>
        {{-- <info class="bg-gray-100 max-h-auto">
            <div>

            </div>
        </info> --}}
        <section class="mt-10 scroll-mt-24 min-h-screen " id="service">
            <div class="max-w-5xl mx-auto px-4 md:px-6">
                <div class="flex items-center justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3 flex-1">
                        <h2 class="text-2xl md:text-3xl font-bold whitespace-nowrap">
                            Layanan Administrasi
                        </h2>
                        <div class="h-1 bg-[#0f766e] flex-1"></div>
                    </div>
                </div>


                <div class="bg-white rounded-2xl shadow border border-gray-100 overflow-hidden">

                    @foreach ($layanan as $index => $item)
                        <a href="{{ url($item['url']) }}"
                            class="group flex flex-col gap-1.5 py-4 border-b border-gray-200
                  last:border-b-0 hover:bg-gray-50 transition-colors
                  duration-150 px-4 text-lg">
                            {{-- Judul --}}
                            <p
                                class="font-bold text-[#1d70b8] leading-relaxed
                      underline decoration-[#1d70b8] underline-offset-5
                      group-hover:decoration-blue-900
                      group-hover:text-blue-900

                      group-hover:decoration-3 transition-all duration-150">

                                <span class="inline active:bg-teal-300">
                                    {{ $item['judul'] }}
                                </span>

                            </p>

                            {{-- Deskripsi --}}
                            <p class="text-gray-500 leading-relaxed line-clamp-2">
                                {{ $item['deskripsi'] }}
                            </p>

                        </a>
                    @endforeach

                </div>

            </div>
        </section>

        <section class="mt-10 scroll-mt-24 min-h-screen bg-[#f9fafb]" id="informasi">
            <div class="max-w-5xl mx-auto px-4 md:px-6">
                <div class="flex items-center justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3 flex-1">
                        <h2 class="text-2xl md:text-3xl font-bold whitespace-nowrap">
                            Pusat Informasi
                        </h2>
                        <div class="h-1 bg-[#0f766e] flex-1"></div>
                    </div>

                </div>

                {{-- Alpine wrapper — state filter di sini --}}
                <div x-data="{
                    activeKategori: 'semua',
                    data: {
                        semua: {{ Js::from($beritaData['semua']) }},
                        berita: {{ Js::from($beritaData['berita']) }},
                        inovasi: {{ Js::from($beritaData['inovasi']) }},
                    },
                    get items() {
                        return this.data[this.activeKategori] ?? this.data.semua
                    },
                    viewMoreUrl() {
                        return this.activeKategori === 'inovasi' ? '#' : '#'
                        // ganti '#' dengan url yang sesuai saat route sudah dibuat:
                        // inovasi  → '{{ url('/inovasi') }}'
                        // default  → '{{ url('/berita') }}'
                    },
                    viewMoreLabel() {
                        return this.activeKategori === 'inovasi' ?
                            'Lihat semua inovasi →' :
                            'Lihat semua berita →'
                    }
                }">

                    {{-- Filter Tabs --}}
                    <div class="flex gap-0 border-b-2 border-gray-300 overflow-x-auto scrollbar-none mb-0">
                        @foreach (['semua' => 'Semua', 'berita' => 'Berita', 'inovasi' => 'Inovasi'] as $key => $label)
                            <button @click="activeKategori = '{{ $key }}'"
                                :class="activeKategori === '{{ $key }}'
                                    ?
                                    'border-b-[3px] border-[#1d70b8] text-gray-900 mb-[2px]' :
                                    'border-b-[3px] border-transparent text-gray-500 hover:text-gray-800'"
                                class="px-4 py-2.5 text-lg font-semibold whitespace-nowrap
                           transition-colors duration-150 bg-transparent border-x-0 border-t-0 cursor-pointer">
                                {{ $label }}
                            </button>
                        @endforeach
                    </div>

                    {{-- News List --}}
                    <div class="flex flex-col">

                        {{-- Empty state --}}
                        <p class="text-lg text-gray-400 py-8 text-center" x-show="items.length === 0">
                            Tidak ada konten untuk kategori ini.
                        </p>

                        {{-- List items via x-for --}}
                        <template x-for="(item, index) in items" :key="item.url + index">
                            <a :href="item.url"
                                class="group flex flex-col gap-1.5 py-4 border-b border-gray-500
                              last:border-b-0 hover:bg-gray-50 transition-colors
                              duration-150 px-1 -mx-1">

                                {{-- Meta: badge + tanggal --}}
                                <div class="flex items-center gap-2 flex-wrap">

                                    {{-- Badge warna per kategori --}}
                                    <span class="inline-block text-base font-semibold px-2 py-0.5"
                                        :class="{
                                            'bg-blue-50 text-[#1d70b8]': item.kategori === 'berita',
                                            'bg-green-50 text-green-800': item.kategori === 'inovasi',
                                            'bg-yellow-50 text-yellow-800': item.kategori === 'pengumuman',
                                            'bg-gray-100 text-gray-700': item.kategori === 'lainnya',
                                        }"
                                        x-text="item.kategori.charAt(0).toUpperCase() + item.kategori.slice(1)">
                                    </span>

                                    <span class="text-sm text-black" x-text="item.tanggal"></span>
                                </div>

                                {{-- Judul — featured (index 0) sedikit lebih besar --}}
                                <p
                                    class="font-bold text-[#1d70b8] leading-relaxed text-lg
                                    underline decoration-[#1d70b8] underline-offset-5 group-hover:decoration-blue-900
                                    group-hover:text-blue-900 group-hover:decoration-3 transition-all duration-150">
                                    <span class="inline active:bg-teal-300" x-text="item.judul">
                                    </span>
                                </p>

                                {{-- Excerpt --}}
                                <p class="text-lg text-gray-500 leading-relaxed line-clamp-2" x-text="item.excerpt">
                                </p>

                            </a>
                        </template>

                    </div>

                    {{-- Footer link dinamis --}}
                    <div class="mt-4 pt-4 border-t border-gray-200 flex items-center justify-between">
                        <a :href="viewMoreUrl()"
                            class="text-lg font-semibold text-[#1d70b8] underline
                          underline-offset-3 hover:text-blue-900 hover:decoration-3"
                            x-text="viewMoreLabel()">
                        </a>
                    </div>

                </div>
            </div>
        </section>

        {{-- <div class="relative w-full h-[480px] overflow-hidden bg-gray-900"
     x-data="{
         active: 0,
         total: {{ max($carouselUpdates->count(), 1) }},
         autoplayTimer: null,

         start() {
             if (this.total <= 1) return;
             if (this.autoplayTimer) clearInterval(this.autoplayTimer);
             this.autoplayTimer = setInterval(() => {
                 this.active = (this.active + 1) % this.total
             }, 5000)
         },

         stop() {
             if (this.autoplayTimer) {
                 clearInterval(this.autoplayTimer);
                 this.autoplayTimer = null;
             }
         },

         go(i) {
             this.active = i;
             this.stop();
             this.start();
         }
     }"
     x-init="start()">

    @if ($carouselUpdates->isEmpty())
        <div class="w-full h-full flex flex-col items-center justify-center bg-gradient-to-br from-[#476EAE] to-[#2d4a82]">
            <p class="text-white/40 text-sm">Belum ada program kegiatan</p>
        </div>
    @else


        @foreach ($carouselUpdates as $i => $update)
@php $thumb = $update->media->first(); @endphp

<div class="absolute inset-0 transition-opacity duration-700"
     :class="active === {{ $i }} ? 'opacity-100 z-10' : 'opacity-0 z-0'">


    @if ($thumb)
        <img src="{{ asset('storage/' . $thumb->file_path) }}"
             class="w-full h-full object-cover">
    @else
        <div class="w-full h-full bg-gradient-to-br from-[#476EAE] to-[#2d4a82]"></div>
    @endif


    <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent pointer-events-none"></div>


    <div class="absolute bottom-0 left-0 right-0 p-8 md:p-12 max-w-4xl pointer-events-none">
        <span class="inline-block text-xs text-white/50 font-mono mb-2 tracking-wider uppercase">
            Program Kegiatan · {{ $update->activity_date ? \Carbon\Carbon::parse($update->activity_date)->translatedFormat('d F Y') : '' }}
        </span>
        <h2 class="text-white font-bold text-2xl md:text-4xl leading-tight line-clamp-2 mb-3">
            {{ $update->title }}
        </h2>
        <p class="text-white/60 text-sm md:text-base line-clamp-2 max-w-2xl">
            {{ Str::limit($update->description, 150) }}
        </p>
    </div>


    <div class="absolute inset-0 z-20 cursor-pointer"
         @click="window.location.href='{{ route('innovation.detail', $update->innovation->slug) }}#{{ $update->slug }}'">
    </div>
</div>
@endforeach


        <button @click.stop="go((active - 1 + total) % total)"
            class="absolute left-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 bg-black/30 hover:bg-black/50 backdrop-blur-sm text-white rounded-full flex items-center justify-center transition">
            &#10094;
        </button>


        <button @click.stop="go((active + 1) % total)"
            class="absolute right-4 top-1/2 -translate-y-1/2 z-30 w-10 h-10 bg-black/30 hover:bg-black/50 backdrop-blur-sm text-white rounded-full flex items-center justify-center transition">
            &#10095;
        </button>


        <div class="absolute bottom-5 right-8 z-30 flex items-center gap-2">
            @foreach ($carouselUpdates as $i => $update)
            <button @click.stop="go({{ $i }})"
                class="transition-all duration-300 rounded-full bg-white"
                :class="active === {{ $i }} ? 'w-6 h-2 opacity-100' : 'w-2 h-2 opacity-40'">
            </button>
            @endforeach
        </div>

    @endif
</div> --}}
        <section class="mt-10 scroll-mt-24 min-h-screen" id="berita">
            <div class="max-w-5xl mx-auto px-4 md:px-6">
                <div class="flex items-center justify-between gap-4 mb-6">
                    <div class="flex items-center gap-3 flex-1">
                        <h2 class="text-2xl md:text-3xl font-bold whitespace-nowrap">
                            Kegiatan
                        </h2>
                        <div class="h-1 bg-[#0f766e] flex-1"></div>
                    </div>
                </div>
                {{-- ── WEEK GROUPS ── --}}
                @forelse ($groupedEvents as $weekKey => $week)

                    <div class="week-group">
                        {{-- Separator header minggu --}}
                        <div class="grid border-t-2 0 border-b
                            bg-gray-50 py-3 mt-6 first:mt-0"
                            style="grid-template-columns: 130px 1fr">
                            <div
                                class="font-mono text-base font-semibold text-[#1d70b8] tracking-tight
                                pr-4 border-r border-gray-300 flex items-center">
                                {{ $weekKey }}
                            </div>
                            <div
                                class="font-sans text-base font-semibold text-gray-500 tracking-widest
                                uppercase pl-4 flex items-center">
                                {{ $week['label'] }}
                            </div>
                        </div>

                        {{-- Event list atau empty state --}}
                        @if ($week['events']->isEmpty())
                            <div class="py-3 pl-4 font-mono text-lg text-gray-400 italic border-b border-gray-200">
                                Belum ada kegiatan terjadwal untuk minggu ini.
                            </div>
                        @else
                            @foreach ($week['events'] as $event)
                                {{-- Row event --}}
                                <div class="grid py-3.5 border-b border-gray-200 last:border-b-0
                                    relative transition-colors duration-100
                                    {{ $event->is_today ? 'bg-blue-50 border-b-blue-200 hover:bg-blue-100' : 'hover:bg-slate-50' }}"
                                    style="grid-template-columns: 130px 1fr">

                                    {{-- Today left bar --}}
                                    @if ($event->is_today)
                                        <span class="absolute left-0 top-0 bottom-0 w-[3px] bg-teal-200"></span>
                                    @endif

                                    {{-- Kolom tanggal --}}
                                    <div
                                        class="flex flex-col items-start pr-4
                                        border-r text-base{{ $event->is_today ? 'border-teal-300 px-2 font-bold' : 'border-gray-200' }}
                                        gap-0.5">
                                        <span class="tracking-widest uppercase text-gray-400 text-base">
                                            {{ $event->day_name }}
                                        </span>
                                        <div class="flex items-center gap-1.5">
                                            <span
                                                class="text-xl font-medium leading-none
                                                 {{ $event->is_today ? 'text-[#1d70b8]' : 'text-[#0f172a]' }}">
                                                {{ $event->day_num }}
                                            </span>
                                            @if ($event->is_today)
                                                <span
                                                    class="w-1.5 h-1.5 rounded-full text-xl bg-red-500 mb-0.5 shrink-0"
                                                    title="Hari ini"></span>
                                            @endif
                                        </div>
                                        <span class=" text-base tracking-wide uppercase text-gray-400">
                                            {{ $event->month_short }}
                                        </span>
                                        @if ($event->is_today)
                                            <span
                                                class="font-mono text-sm font-semibold tracking-widest uppercase
                                                 bg-red-500 text-white px-1.5 py-0.5 mt-1 leading-tight">
                                                Hari ini
                                            </span>
                                        @endif
                                    </div>

                                    {{-- Kolom konten --}}
                                    <div class="pl-4 flex flex-col gap-1 justify-center">
                                        <div
                                            class="text-lg font-semibold leading-snug
                                            {{ $event->is_today ? 'text-[#1d70b8]' : 'text-[#0f172a]' }}">
                                            {{ $event->nama }}
                                        </div>
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <x-event-jenis-badge :jenis="$event->jenis" />
                                            <span class="font-mono text-lg text-gray-400 flex items-center gap-1">
                                                <svg class="w-2.5 h-2.5 shrink-0" viewBox="0 0 16 16" fill="none"
                                                    stroke="currentColor" stroke-width="2">
                                                    <circle cx="8" cy="7" r="3" />
                                                    <path
                                                        d="M8 2C5.24 2 3 4.24 3 7c0 4 5 9 5 9s5-5 5-9c0-2.76-2.24-5-5-5z" />
                                                </svg>
                                                {{ $event->lokasi }}
                                            </span>
                                        </div>
                                    </div>

                                </div>
                                {{-- /row event --}}
                            @endforeach
                        @endif

                    </div>
                    {{-- /week-group --}}

                @empty
                    {{-- Tidak ada kegiatan sama sekali dalam 3 minggu ke depan --}}
                    <div class="py-10 text-center border border-dashed border-gray-300">
                        <p class="font-mono text-xs text-gray-400 tracking-wide">
                            Belum ada kegiatan terjadwal dalam 3 minggu ke depan.
                        </p>
                    </div>
                @endforelse

                {{-- ── FOOTER ── --}}
                @if ($groupedEvents->isNotEmpty())
                    <div class="mt-8 pt-4 border-t border-gray-200 flex items-center justify-between gap-4 flex-wrap ">
                        <p class="text-lg text-black">
                            @if ($kalenderMeta['remaining'] > 0)
                                Menampilkan <span class="text-[#1d70b8] font-semibold">{{ $kalenderMeta['shown'] }}
                                    kegiatan</span>
                                terdekat
                                &middot;
                                {{ $kalenderMeta['remaining'] }} kegiatan lainnya
                                @if ($kalenderMeta['remaining_this_week'] > 0)
                                    di minggu {{ $kalenderMeta['last_shown_week'] }}
                                @endif
                                tersedia di kalender lengkap
                            @else
                                Menampilkan
                                <span class="text-[#1d70b8] font-semibold">{{ $kalenderMeta['shown'] }}
                                    kegiatan</span>
                                mendatang
                            @endif
                        </p>
                        <a href="#"
                            class="inline-flex items-center gap-1.5 font-mono text-lg font-medium border-b-4
                          text-teal-900 border-2 border-teal-900 px-3 py-1.5
                          hover:bg-teal-900 hover:text-white transition-colors duration-150">
                            Semua Kegiatan
                            <svg class="w-3 h-3" viewBox="0 0 16 16" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="square">
                                <path d="M3 8h10M9 4l4 4-4 4" />
                            </svg>
                        </a>
                    </div>
                @endif
            </div>
        </section>
        <x-footerlanding/>

    </div>
</body>

</html>
