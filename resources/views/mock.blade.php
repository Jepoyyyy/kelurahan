<div class="body">
            <div class="bg-gray-50 py-8 px-4 md:px-8">
                <div class="max-w-7xl mx-auto">


                    <div class="= mb-8">
                        <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                            Kalender Kegiatan
                        </h1>
                        <p class="text-gray-500 mt-2 text-sm">
                            Jadwal kegiatan dan event penting kelurahan
                        </p>
                    </div>

                    {{-- Content --}}
                    <div class="flex flex-col lg:flex-row gap-6">

                        {{-- LEFT: Calendar --}}
                        <div class="flex-1 bg-white rounded-xl shadow p-4 md:p-6">

                            <div id="calendar" class="min-h-[450px]"></div>

                            {{-- Legends --}}
                            <div class="flex flex-wrap justify-center gap-4 mt-6 pt-4 border-t">
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 bg-blue-500 rounded-full"></span>
                                    <span class="text-sm text-gray-600">RT</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 bg-yellow-500 rounded-full"></span>
                                    <span class="text-sm text-gray-600">Kecamatan</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 bg-green-500 rounded-full"></span>
                                    <span class="text-sm text-gray-600">Kelurahan</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <span class="w-3 h-3 bg-gray-400 rounded-full"></span>
                                    <span class="text-sm text-gray-600">Umum</span>
                                </div>
                            </div>
                        </div>

                        {{-- RIGHT: Event List --}}
                        <div class="lg:w-80 w-full bg-white rounded-xl shadow p-5 flex flex-col">

                            <div class="flex items-center justify-between mb-4">
                                <h3 class="font-bold text-lg text-gray-800">
                                    Kegiatan Terdekat
                                </h3>
                            </div>

                            {{-- Scrollable List --}}
                            <div
                                class="flex flex-col gap-3  max-h-[700px] overflow-y-auto pr-1 bg-gray-200 rounded-lg p-2  border-gray-300 shadow-2xl">

                                @forelse($upcomingEvents as $event)
                                    <div
                                        class="flex items-start gap-3 p-3 bg-gray-50 rounded-xl hover:bg-blue-50 hover:translate-x-1 transition-all duration-200 cursor-pointer">

                                        {{-- Dot --}}
                                        <span class="w-2 h-2 mt-2 rounded-full shrink-0"
                                            style="background-color: {{ match ($event->jenis) {
                                                'rt' => '#3B82F6',
                                                'kecamatan' => '#F59E0B',
                                                'kelurahan' => '#10B981',
                                                default => '#6B7280',
                                            } }}">
                                        </span>

                                        {{-- Content --}}
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-semibold text-gray-800 line-clamp-1">
                                                {{ $event->nama }}
                                            </p>

                                            <p class="text-xs text-gray-400 mt-1">
                                                {{ $event->formatted_date }}
                                            </p>

                                            <p class="text-xs text-gray-500 mt-1 line-clamp-1">
                                                {{ $event->lokasi }}
                                            </p>
                                        </div>
                                    </div>

                                @empty
                                    <p class="text-sm text-gray-400 text-center py-6">
                                        Tidak ada kegiatan terdekat.
                                    </p>
                                @endforelse

                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <div class="map-sec-wrapper p-5">
                <div class="map-header">
                    <h1 class="text-2xl font-bold">Peta Kelurahan</h1>
                </div>
                <div class="map-content ">
                    <div class="map-container">
                        //map here
                        <div class="map-info">
                            <h1 class=" ">Informasi Kelurahan</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.</p>

                        </div>
                    </div>

                </div>
            </div>
            <div class="news-wrapper w-full flex flex-col p-4 mb-4">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold">Berita Terkini</h1>
                    <p class="text-sm text-gray-500 mt-1">Informasi terbaru seputar Kelurahan Simpang III Sipin</p>
                </div>

                <div class="flex flex-col lg:flex-row gap-6">

                    {{-- Highlighted --}}
                    {{-- Highlighted --}}
                    @if ($highlighted)
                        <div class="lg:w-7/12 shrink-0">
                            <a href="#" class="group block h-full">
                                <div class="relative h-80 md:h-96 overflow-hidden rounded-xl shadow-lg">
                                    <img src="{{ $highlighted->picture ? asset('storage/' . $highlighted->picture) : asset('default.jpg') }}"
                                        alt="{{ $highlighted->title }}"
                                        class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                                    <div
                                        class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/30 to-transparent">
                                    </div>

                                    <div class="absolute bottom-0 left-0 right-0 p-5">
                                        <div class="flex items-center gap-2 mb-2">
                                            <svg class="w-3 h-3 text-white/60" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                </path>
                                            </svg>
                                            <span
                                                class="text-white/70 text-xs">{{ $highlighted->formatted_date ?? optional($highlighted->created_at)->format('d F Y') }}</span>
                                        </div>
                                        <h2
                                            class="text-white font-bold text-xl md:text-2xl leading-tight line-clamp-2 hover:text-blue-300 transition-colors">
                                            {{ $highlighted->title }}
                                        </h2>
                                        <p class="text-white/60 text-sm mt-2 line-clamp-2">
                                            {{ Str::limit($highlighted->description, 120) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @else
                        <div class="lg:w-7/12 shrink-0">
                            <div
                                class="relative h-80 md:h-96 overflow-hidden rounded-xl shadow-lg bg-gray-200 flex items-center justify-center">
                                <p class="text-gray-400 text-sm">Belum ada berita.</p>
                            </div>
                        </div>
                    @endif

                    {{-- List --}}
                    <div class="flex flex-col gap-3 flex-1">

                        {{-- Scroll Container --}}
                        <div class="flex flex-col gap-3 flex-1">

                            {{-- Scroll container --}}
                            <div class="flex flex-col gap-3 max-h-[400px] overflow-y-auto pr-2">

                                @forelse($newsList as $index => $news)
                                    <a href="#"
                                        class="group flex gap-3 border-b border-gray-100 pb-3 last:border-0 hover:bg-gray-50 rounded-lg p-2 transition">

                                        {{-- Image --}}
                                        <div class="shrink-0 w-24 h-20 overflow-hidden rounded-lg">
                                            <img src="{{ $news->picture ? asset('storage/' . $news->picture) : asset('default.jpg') }}"
                                                class="w-full h-full object-cover group-hover:scale-105 transition">
                                        </div>

                                        {{-- Content --}}
                                        <div class="flex flex-col flex-1 min-w-0">

                                            <div class="flex justify-between items-center">
                                                <span class="text-xs text-gray-400">
                                                    {{ $news->formatted_date ?? optional($news->created_at)->format('d F Y') }}
                                                </span>

                                                @if ($index < 3)
                                                    <span
                                                        class="text-[10px] bg-blue-100 text-blue-600 px-2 py-0.5 rounded-full">
                                                        Baru
                                                    </span>
                                                @endif
                                            </div>

                                            <h3
                                                class="text-sm font-semibold text-gray-800 line-clamp-2 group-hover:text-blue-600">
                                                {{ $news->title }}
                                            </h3>

                                            <p class="text-xs text-gray-500 line-clamp-2">
                                                {{ \Illuminate\Support\Str::limit($news->description, 80) }}
                                            </p>

                                        </div>
                                    </a>

                                @empty
                                    <p class="text-sm text-gray-400 text-center py-6">
                                        Belum ada berita.
                                    </p>
                                @endforelse

                            </div>

                        </div>

                    </div>

                </div>
            </div>
