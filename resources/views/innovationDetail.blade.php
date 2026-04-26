<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/details.js'])
    <title>{{ $innovation->title }} — Editorial Inovasi</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
</head>
<body class="font-['Inter'] bg-white text-gray-900 antialiased"
    x-data="innovationDetail()"
    @keydown.escape.window="closeLightbox()"
    @keydown.arrow-left.window="if(lightboxOpen) prevImage()"
    @keydown.arrow-right.window="if(lightboxOpen) nextImage()">

    {{-- ============ LIGHTBOX MODAL ============ --}}
<div
    x-show="lightboxOpen"
    x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-150"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-50 bg-black/95 flex items-center justify-center"
    @click.self="closeLightbox()"
    style="display:none"
>
    <button @click="closeLightbox()" class="absolute top-6 right-8 text-white text-4xl leading-none hover:opacity-70 transition-opacity">&times;</button>
    <button @click="prevImage()" class="absolute left-6 top-1/2 -translate-y-1/2 text-white text-5xl leading-none hover:opacity-70 transition-opacity px-4">&#10094;</button>

    {{-- Image --}}
    <img x-show="currentType === 'image'"
         :src="currentImage"
         class="max-w-[90%] max-h-[90vh] object-contain rounded-lg shadow-2xl">

    {{-- Video --}}
    <video x-show="currentType === 'video'"
           id="lightbox-video"
           :src="currentImage"
           controls
           class="max-w-[90%] max-h-[90vh] rounded-lg shadow-2xl"
           style="display:none">
    </video>

    <button @click="nextImage()" class="absolute right-6 top-1/2 -translate-y-1/2 text-white text-5xl leading-none hover:opacity-70 transition-opacity px-4">&#10095;</button>
    <div class="absolute bottom-6 left-0 right-0 text-center text-white text-sm font-mono">
        <span x-text="currentIndex + 1"></span> / <span x-text="totalImages"></span>
    </div>
</div>

    {{-- ============ NAVBAR ============ --}}
    <nav class="fixed top-0 left-0 right-0 z-40 bg-white/90 backdrop-blur-md border-b border-gray-100">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="flex items-center justify-between h-16">
                <a href="{{ route('landing') }}"
                   class="group inline-flex items-center gap-2 text-sm text-gray-400 hover:text-gray-900 transition-all duration-300">
                    <svg class="w-4 h-4 group-hover:-translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali ke Beranda
                </a>
                <span class="text-xs font-medium text-gray-400 tracking-wider">EDITORIAL</span>
            </div>
        </div>
    </nav>

    {{-- ============ HERO SECTION ============ --}}
    <header class="pt-32 pb-20 md:pt-40 md:pb-28">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="max-w-3xl">
                <div class="mb-6 opacity-0 animate-fade-up">
                    <span class="inline-block text-xs font-semibold tracking-[0.2em] text-gray-400 uppercase border-l-2 border-gray-900 pl-4">
                        PROGRAM INOVASI
                    </span>
                </div>
                <h1 class="font-['Playfair_Display'] text-5xl md:text-6xl lg:text-7xl font-bold leading-[1.1] tracking-tight text-gray-900 mb-6 opacity-0 animate-fade-up">
                    {{ $innovation->title }}
                </h1>
                <div class="w-16 h-px bg-gray-200 mb-8 opacity-0 animate-fade-up delay-100"></div>
                <p class="text-xl md:text-2xl text-gray-400 leading-relaxed mb-8 opacity-0 animate-fade-up delay-200">
                    {{ $innovation->description }}
                </p>
                <div class="flex flex-wrap gap-6 text-sm opacity-0 animate-fade-up delay-300">
                    <div class="flex items-center gap-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ $innovation->created_at ? $innovation->created_at->format('d F Y') : '-' }}</span>
                    </div>
                    <div class="flex items-center gap-2 text-gray-400">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <span>Diperbarui {{ $innovation->updated_at ? $innovation->updated_at->diffForHumans() : '-' }}</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- ============ STATS SECTION ============ --}}
    <section class="py-16 border-y border-gray-100 bg-gray-50/30">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12">
                @foreach ([
                    ['value' => $updates->total(), 'label' => 'Total Update', 'desc' => 'Perkembangan program'],
                    ['value' => $totalMedia, 'label' => 'Media Terlampir', 'desc' => 'Dokumentasi visual'],
                    ['value' => $recentUpdates, 'label' => 'Update (30 Hari)', 'desc' => 'Aktivitas terkini'],
                ] as $stat)
                <div class="text-center group">
                    <div class="font-['Playfair_Display'] text-5xl font-bold text-gray-900 mb-2">{{ $stat['value'] }}</div>
                    <div class="text-xs font-semibold text-gray-400 uppercase tracking-wider mb-3">{{ $stat['label'] }}</div>
                    <div class="w-8 h-px bg-gray-300 mx-auto group-hover:w-12 transition-all duration-300"></div>
                    <p class="text-xs text-gray-400 mt-3">{{ $stat['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============ TIMELINE SECTION ============ --}}
    <section class="pb-24 pt-24">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="mb-16">
                <div class="flex items-center gap-4 mb-4">
                    <div class="w-12 h-px bg-gray-300"></div>
                    <span class="text-xs font-semibold tracking-[0.2em] text-gray-400 uppercase">Perjalanan Program</span>
                </div>
                <h2 class="font-['Playfair_Display'] text-4xl md:text-5xl font-bold text-gray-900 mb-4">Timeline Update</h2>
                <p class="text-gray-400 max-w-md">Setiap langkah memiliki cerita. Berikut dokumentasi lengkap perkembangan program.</p>
            </div>

            <div class="space-y-20">
                @forelse ($updates as $index => $update)
                <div class="group" >
                    <div class="flex flex-col md:flex-row md:items-start gap-6 md:gap-8">

                        {{-- Nomor Timeline --}}
                        <div class="md:w-24 md:text-right md:sticky md:top-32 md:self-start">
                            <span class="font-['Playfair_Display'] text-5xl font-bold text-gray-200 group-hover:text-gray-300 transition-colors duration-300">
                                {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            @if($update->created_at)
                            <div class="text-xs text-gray-400 mt-2 font-mono hidden md:block">
                                {{ $update->created_at->format('d.m.Y') }}
                            </div>
                            @endif
                        </div>

                        {{-- Konten Timeline --}}
                        <div class="flex-1 border-l-2 border-gray-100 pl-6 md:pl-8 group-hover:border-gray-300 transition-colors duration-300" >

                            @if($update->created_at)
                            <div class="text-xs text-gray-400 mb-3 font-mono md:hidden">
                                {{ $update->created_at->format('d F Y') }}
                            </div>
                            @endif

                            <h3
    id="{{ $update->slug }}"
    class="scroll-mt-24 font-['Playfair_Display'] text-2xl md:text-3xl font-semibold text-gray-900 mb-5"
>
    {{ $update->title }}
</h3>

                            {{-- ============ THUMBNAIL ============ --}}
                            @if($update->media->isNotEmpty())
    <div class="mb-6">
        <div class="relative rounded-xl overflow-hidden bg-gray-100 cursor-pointer shadow-sm hover:shadow-md transition-shadow duration-300 max-w-2xl group/thumb"
             @click="openLightbox({{ json_encode($update->all_images) }}, 0)">

            {{-- Cek tipe file thumbnail --}}
            @if($update->thumbnail->file_type === 'image')
    <img src="{{ asset('storage/' . $update->thumbnail->file_path) }}"
         alt="{{ $update->title }}"
         class="w-full h-64 md:h-80 object-cover transition-transform duration-700 group-hover/thumb:scale-105">
@else
    {{-- Video thumbnail — tampil poster dengan play button, klik buka lightbox --}}
    <div class="relative w-full h-64 md:h-80 bg-black flex items-center justify-center">
        <video class="w-full h-full object-cover opacity-60"
               preload="metadata">
            <source src="{{ asset('storage/' . $update->thumbnail->file_path) }}#t=0.5">
        </video>
        {{-- Play button overlay --}}
        <div class="absolute inset-0 flex items-center justify-center">
            <div class="w-16 h-16 bg-white/20 backdrop-blur rounded-full flex items-center justify-center hover:bg-white/30 transition-colors">
                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                </svg>
            </div>
        </div>
    </div>
@endif

            <div class="absolute inset-0 bg-black/0 group-hover/thumb:bg-black/5 transition-colors duration-300"></div>

            @if($update->gallery->isNotEmpty())
                <div class="absolute bottom-3 right-3 bg-black/60 backdrop-blur text-white text-xs px-2 py-1 rounded-md flex items-center gap-1">
                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    +{{ $update->gallery->count() }} foto
                </div>
            @endif
        </div>
    </div>
@endif

                            {{-- ============ DESCRIPTION ============ --}}
                            <p class="text-gray-500 leading-relaxed mb-6" >{{ $update->description }}</p>

                            {{-- ============ GALLERY GRID ============ --}}
                            {{-- ============ GALLERY GRID ============ --}}
@if($update->gallery->isNotEmpty())
<div class="mt-8">
    <div class="flex items-center gap-2 mb-4">
        <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
        </svg>
        <span class="text-sm font-medium text-gray-500">Dokumentasi</span>
        <span class="text-xs text-gray-300">({{ $update->gallery->count() }})</span>
    </div>

    <div class="grid grid-cols-2 md:grid-cols-4 gap-2">
        @foreach($update->gallery->take(4) as $gIndex => $gMedia)

        {{-- Foto ke-4 dengan sisa: override @click buka di index foto ke-4 --}}
        @if($loop->iteration === 4 && $update->gallery->count() > 4)
        <div class="relative group/grid cursor-pointer rounded-lg overflow-hidden bg-gray-100 aspect-square"
             @click="openLightbox({{ json_encode($update->all_images) }}, {{ $gIndex + 1 }})">
            <img src="{{ asset('storage/' . $gMedia->file_path) }}"
                 alt="{{ $update->title }} galeri {{ $gIndex + 1 }}"
                 class="w-full h-full object-cover transition-transform duration-300 group-hover/grid:scale-110">
            {{-- Overlay +N — pointer-events-none dihapus, klik ditangani parent div --}}
            <div class="absolute inset-0 bg-black/60 hover:bg-black/70 transition-colors duration-300 flex flex-col items-center justify-center">
                <svg class="w-6 h-6 text-white/70 mb-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <span class="text-white text-2xl font-bold">+{{ $update->gallery->count() - 3 }}</span>
                <span class="text-white/70 text-xs mt-1">foto lainnya</span>
            </div>
        </div>

        {{-- Foto biasa --}}
        @else
        <div class="relative group/grid cursor-pointer rounded-lg overflow-hidden bg-gray-100 aspect-square"
             @click="openLightbox({{ json_encode($update->all_images) }}, {{ $gIndex + 1 }})">
            <img src="{{ asset('storage/' . $gMedia->file_path) }}"
                 alt="{{ $update->title }} galeri {{ $gIndex + 1 }}"
                 class="w-full h-full object-cover transition-transform duration-300 group-hover/grid:scale-110">
            <div class="absolute inset-0 bg-black/0 group-hover/grid:bg-black/30 transition-colors duration-300 flex items-center justify-center">
                <svg class="w-6 h-6 text-white opacity-0 group-hover/grid:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
        </div>
        @endif

        @endforeach
    </div>
</div>
@endif

                        </div>
                    </div>
                </div>
                @empty
                <div class="text-center py-20">
                    <div class="w-24 h-24 mx-auto mb-6 rounded-full bg-gray-50 flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="font-['Playfair_Display'] text-2xl font-semibold text-gray-400 mb-2">Belum Ada Update</h3>
                    <p class="text-gray-300">Program ini akan segera hadir dengan pembaruan pertama.</p>
                </div>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-16">
                {{ $updates->links() }}
            </div>
        </div>
    </section>

    {{-- ============ FOOTER ============ --}}
    <footer class="border-t border-gray-100 py-12 mt-12">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="flex flex-col md:flex-row justify-between gap-8">
                <div class="flex-1">
                    <div class="font-['Playfair_Display'] text-sm font-semibold text-gray-400 mb-2">INOVASI</div>
                    <p class="text-xs text-gray-400 max-w-xs">Mendokumentasikan program inovasi untuk masa depan yang lebih baik.</p>
                </div>

            </div>
            <div class="border-t border-gray-100 mt-8 pt-8 text-center">
                <p class="text-xs text-gray-400">&copy; {{ date('Y') }} Sistem Informasi Kelurahan</p>
            </div>
        </div>
    </footer>

</body>
</html>
