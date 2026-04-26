<footer class="mt-10 scroll-mt-24 min-h-screen" id="footer">
    <div class="h-2 bg-[#0f766e] flex-1"></div>
    <div class="max-w-5xl mx-auto px-4 md:px-6">
        <div class="relative z-10 container mx-auto  max-w-6xl">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 border-b">
                {{-- Layanan (ambil 2 kolom!) --}}
                <div class="lg:col-span-2">
                    <h3 class=" text-2xl font-bold tracking-wider border-b pb-3 border-teal-500">
                        Layanan
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-3 py-10">
                        @foreach (config('layanan.list') as $item)
                            <a href="{{ $item['url'] }}"
                                class="text-xl underline hover:decoration-4 leading-snug underline-offset-6">
                                {{ $item['judul'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
                <div>
                    <h3 class=" text-2xl font-bold tracking-wider border-b pb-3 border-teal-500">
                        Informasi
                    </h3>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-3 py-10">
                        @foreach (config('footer.list') as $item)
                            <a href="{{ $item['url'] }}"
                                class="text-xl underline hover:decoration-4 leading-snug underline-offset-6">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        {{-- Bottom Bar --}}
        <div class="relative z-10 border-t border-white/10">
            <div class="flex justify-between items-end gap-12 py-5 ">

                {{-- KIRI --}}
                <div class="max-w-md">
                    <div class="flex items-end gap-3 mb-3">
                        <img src="{{ asset('kotajambilogo.png') }}" class="w-12 h-12 object-contain">

                        <div class="text-lg">
                            <h2 class="font-bold leading-tight">
                                Kelurahan Simpang III Sipin
                            </h2>
                            <p class="">
                                Kecamatan Kotabaru, Kota Jambi
                            </p>
                        </div>
                    </div>

                    <p class=" text-lg leading-relaxed ">
                        Melayani masyarakat Simpang III Sipin dengan sepenuh hati demi terwujudnya kelurahan yang maju
                        dan sejahtera.
                    </p>
                </div>

                {{-- KANAN --}}
                <div class="flex flex-col gap-3 text-left pr-3">
                    @foreach (config('navbar.list') as $item)
                        <a href="{{ $item['url'] }}" class="text-xl underline hover:decoration-4 underline-offset-6">
                            {{ $item['label'] }}
                        </a>
                    @endforeach
                </div>

            </div>
            <div class="h-[1px] bg-[#0f766e] flex-1"></div>
            <div class="mx-auto py-3  flex flex-col md:flex-row items-center justify-between gap-2">
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-2">
                        <span class="text-base ">Total Pengunjung:</span>
                        <span class="text-base ">{{ number_format($views) }}</span>
                    </div>
                    <span class="text-base  hidden md:inline">|</span>
                    @php
                        $hari = now()->dayOfWeek; // 0=Minggu, 1=Sen ... 6=Sabtu
                        $buka = $hari >= 1 && $hari <= 5;
                    @endphp
                    <div class="hidden md:flex items-center gap-1 bg-white/10 rounded px-2 py-0.5">
                        <span
                            class="w-1.5 h-1.5 rounded-full inline-block {{ $buka ? 'bg-green-400' : 'bg-red-400' }}"></span>
                        <span class="text-base">{{ $buka ? 'Buka Hari Ini' : 'Tutup Hari Ini' }}</span>
                    </div>
                </div>
                <p class=" text-base ">
                    &copy; {{ date('Y') }} Kelurahan Simpang III Sipin.
                </p>
            </div>
        </div>
    </div>

</footer>
