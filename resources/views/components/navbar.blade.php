<div class="header-wrapper">
    <div
        x-data="{ menuOpen: false }"
        x-cloak
        class="fixed top-0 left-0 w-full z-50 bg-white shadow-md py-3"
    >
        <div class="container mx-auto px-4 md:px-8">
            <div class="flex items-center justify-between gap-4">

                <!-- LOGO + TITLE - Left Side -->
                <div class="flex items-center gap-3 shrink-0">
                    <img src="{{ asset('kotajambilogo.png') }}"
                         class="w-10 h-10 object-contain"
                         alt="Logo">
                    <div class="hidden sm:block">
                        <h1 class="font-bold text-sm md:text-base text-gray-800 leading-tight">Kelurahan Simpang III Sipin</h1>
                        <p class="text-xs text-gray-500">Kecamatan Kotabaru</p>
                    </div>
                </div>

                <!-- NAVIGATION LINKS - Center (Desktop) -->
                <ul class="hidden md:flex items-center gap-6 lg:gap-8">
                    <li><a href="{{ route('landing') }}" class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300">Beranda</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300">Layanan</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300">Tentang</a></li>
                    <li><a href="#" class="text-gray-600 hover:text-blue-600 font-medium transition-colors duration-300">Kontak</a></li>
                </ul>

                <!-- RIGHT SIDE - Desktop -->
                <div class="hidden md:flex items-center gap-3">
                    

                    <!-- Language Switcher -->
                    <div x-data="{ lang: 'ID' }" class="flex items-center rounded-lg overflow-hidden border border-gray-200 text-sm font-medium">
                        <button @click="lang = 'ID'"
                                class="px-3 py-1.5 transition-all duration-300"
                                :class="lang === 'ID' ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-50'">
                            ID
                        </button>
                        <button @click="lang = 'EN'"
                                class="px-3 py-1.5 transition-all duration-300"
                                :class="lang === 'EN' ? 'bg-blue-600 text-white' : 'bg-white text-gray-600 hover:bg-gray-50'">
                            EN
                        </button>
                    </div>

                    <!-- Login Button -->
                    <a href="{{ route('dashboard') }}"
                       class="bg-blue-600 text-white px-5 py-2 rounded-lg font-medium hover:bg-blue-700 transition-all duration-300 shadow-sm hover:shadow-md">
                        Login
                    </a>
                </div>

                <!-- HAMBURGER MENU - Mobile -->
                <button class="md:hidden flex flex-col justify-center items-center w-10 h-10 gap-1.5 rounded-lg hover:bg-gray-100 transition-all duration-300"
                        @click="menuOpen = !menuOpen">
                    <span class="block w-6 h-0.5 bg-gray-600 transition-all duration-300"
                          :class="menuOpen ? 'rotate-45 translate-y-2' : ''"></span>
                    <span class="block w-6 h-0.5 bg-gray-600 transition-all duration-300"
                          :class="menuOpen ? 'opacity-0' : ''"></span>
                    <span class="block w-6 h-0.5 bg-gray-600 transition-all duration-300"
                          :class="menuOpen ? '-rotate-45 -translate-y-2' : ''"></span>
                </button>
            </div>

            <!-- MOBILE MENU DROPDOWN -->
            <div x-show="menuOpen"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 -translate-y-2"
                 x-transition:enter-end="opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0"
                 x-transition:leave-end="opacity-0 -translate-y-2"
                 class="md:hidden mt-4 pt-4 border-t border-gray-100">

                <!-- Mobile Navigation Links -->
                <div class="flex flex-col gap-2">
                    <a href="{{ route('landing') }}"
                       class="px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-300"
                       @click="menuOpen = false">
                        Beranda
                    </a>
                    <a href="#"
                       class="px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-300"
                       @click="menuOpen = false">
                        Layanan
                    </a>
                    <a href="#"
                       class="px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-300"
                       @click="menuOpen = false">
                        Tentang
                    </a>
                    <a href="#"
                       class="px-3 py-2 text-gray-700 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors duration-300"
                       @click="menuOpen = false">
                        Kontak
                    </a>
                </div>

                <!-- Mobile Action Buttons -->
                <div class="mt-4 pt-4 border-t border-gray-100 space-y-3">
                    <!-- Search Bar Mobile -->
                    <div class="relative">
                        <input type="text"
                               placeholder="Cari..."
                               class="w-full px-4 py-2 pr-10 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-400">
                        <svg class="absolute right-3 top-2.5 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35M17 11A6 6 0 1 1 5 11a6 6 0 0 1 12 0z"/>
                        </svg>
                    </div>

                    <!-- Mobile Language & Login -->
                    <div class="flex gap-3">
                        <div x-data="{ lang: 'ID' }" class="flex rounded-lg overflow-hidden border border-gray-200 text-sm font-medium">
                            <button @click="lang = 'ID'"
                                    class="px-4 py-2 transition-all duration-300"
                                    :class="lang === 'ID' ? 'bg-blue-600 text-white' : 'bg-white text-gray-600'">
                                ID
                            </button>
                            <button @click="lang = 'EN'"
                                    class="px-4 py-2 transition-all duration-300"
                                    :class="lang === 'EN' ? 'bg-blue-600 text-white' : 'bg-white text-gray-600'">
                                EN
                            </button>
                        </div>

                        <a href="{{ route('dashboard') }}"
                           class="flex-1 text-center bg-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:bg-blue-700 transition-all duration-300">
                            Login
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Spacer to prevent content from hiding under fixed navbar -->
    <div class="h-16 md:h-20"></div>
</div>
