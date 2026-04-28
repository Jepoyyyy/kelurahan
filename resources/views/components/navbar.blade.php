{{-- resources/views/components/navbar.blade.php --}}

@php
    $navList = config('navbar.list', []);
    $navUrls = collect($navList)->pluck('url')->toArray();
@endphp

<div x-data="navbarData()" x-cloak class="header-wrapper">
    <div id="nav-sections" data-sections='@json($navUrls)' class="hidden"></div>

    <nav
        :class="scrolled ? 'bg-white/95 backdrop-blur-sm' : 'bg-white'"
        class="fixed top-0 left-0 w-full z-50 shadow-[0_1px_0_0_#e5e7eb] transition-all duration-300"
    >
        <div class="h-[3px] bg-teal-700 w-full"></div>

        <div class="container mx-auto px-4 md:px-8">
            <div class="flex items-center justify-between h-16">

                {{-- LOGO --}}
                <div class="flex items-center gap-3 shrink-0">
                    <img src="{{ asset('kotajambilogo.png') }}"
                         class="w-9 h-9 object-contain"
                         alt="Logo Kelurahan Simpang III Sipin">
                    <div class="hidden sm:block leading-tight">
                        <h1 class="text-sm font-semibold text-gray-900 tracking-tight">Kelurahan Simpang III Sipin</h1>
                        <p class="text-[10px] text-gray-400 font-medium tracking-wide uppercase">Kecamatan Kotabaru</p>
                    </div>
                </div>

                {{-- DESKTOP NAV --}}
                <ul class="hidden md:flex items-stretch h-16">
                    @foreach ($navList as $item)
                        @php
                            $sectionId = ltrim(parse_url($item['url'], PHP_URL_FRAGMENT) ?? '', '/');
                        @endphp
                        <li class="flex items-stretch">
                            <a href="{{ $item['url'] }}"
                               data-section="{{ $sectionId }}"
                               class="nav-link relative flex items-center px-4 text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors duration-200 group"
                            >
                                {{ $item['label'] }}
                                <span class="nav-underline absolute bottom-0 left-0 w-full h-[2.5px] bg-teal-700 opacity-0 group-hover:opacity-30 transition-all duration-200"></span>
                            </a>
                        </li>
                    @endforeach
                </ul>

                {{-- DESKTOP RIGHT --}}
                <div class="hidden md:flex items-center gap-3">
                    <button class="p-2 text-gray-400 hover:text-teal-700 hover:bg-teal-50 transition-colors duration-200 rounded-sm" title="Cari">
                        <x-heroicon-o-magnifying-glass class="w-4 h-4" />
                    </button>
                    <a href="{{ route('dashboard') }}"
                       class="inline-flex items-center gap-1.5 text-sm font-semibold text-teal-800 border-2 border-teal-800 px-4 py-1.5 hover:bg-teal-800 hover:text-white transition-colors duration-150 tracking-wide">
                        Masuk
                        <x-heroicon-s-arrow-right class="w-3.5 h-3.5" />
                    </a>
                </div>

                {{-- HAMBURGER --}}
                <button
                    class="md:hidden p-2 rounded-sm text-gray-500 hover:bg-teal-50 hover:text-teal-700 transition-colors duration-200"
                    @click="menuOpen = !menuOpen"
                    :aria-expanded="menuOpen"
                    aria-label="Menu navigasi"
                >
                    <x-heroicon-o-bars-3 x-show="!menuOpen" class="w-5 h-5" />
                    <x-heroicon-o-x-mark x-show="menuOpen" class="w-5 h-5" />
                </button>

            </div>
        </div>

        {{-- MOBILE DROPDOWN --}}
        <div
            x-show="menuOpen"
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0 -translate-y-1"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-1"
            class="md:hidden border-t border-gray-100 bg-white"
        >
            <div class="container mx-auto px-4 py-3 space-y-0.5">
                @foreach ($navList as $item)
                    @php
                        $sectionId = ltrim(parse_url($item['url'], PHP_URL_FRAGMENT) ?? '', '/');
                        $icons = [
                            'beranda'    => 'heroicon-o-home',
                            'profil'     => 'heroicon-o-building-office',
                            'layanan'    => 'heroicon-o-clipboard-document-list',
                            'pengumuman' => 'heroicon-o-megaphone',
                            'galeri'     => 'heroicon-o-photo',
                            'kontak'     => 'heroicon-o-phone',
                            'informasi'  => 'heroicon-o-information-circle',
                            'kegiatan'   => 'heroicon-o-calendar-days',
                        ];
                        $icon = $icons[$sectionId] ?? 'heroicon-o-chevron-right';
                    @endphp
                    <a href="{{ $item['url'] }}"
                       data-section="{{ $sectionId }}"
                       class="mobile-nav-link group flex items-center gap-3 px-3 py-2.5 rounded-sm text-sm font-medium text-gray-600 hover:text-teal-700 hover:bg-teal-50 transition-colors duration-150"
                       @click="menuOpen = false"
                    >
                        <x-dynamic-component :component="$icon" class="w-4 h-4 shrink-0" />
                        {{ $item['label'] }}
                        <x-heroicon-o-chevron-right class="chevron w-3.5 h-3.5 ml-auto text-gray-300" />
                    </a>
                @endforeach
            </div>

            <div class="container mx-auto px-4 pb-4 pt-2 border-t border-gray-100 mt-2">
                <a href="{{ route('dashboard') }}"
                   class="flex items-center justify-center gap-2 w-full text-sm font-semibold text-teal-800 border-2 border-teal-800 px-4 py-2.5 hover:bg-teal-800 hover:text-white transition-colors duration-150 tracking-wide">
                    Masuk ke Dashboard
                    <x-heroicon-s-arrow-right class="w-4 h-4" />
                </a>
            </div>
        </div>

    </nav>

    <div class="h-[67px]"></div>
</div>
