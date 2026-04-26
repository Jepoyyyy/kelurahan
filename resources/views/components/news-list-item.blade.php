@props([
    'item',
    'featured' => false,
])

<a href="{{ $item['url'] }}"
   class="group flex flex-col gap-1.5 py-4 border-b border-gray-300 last:border-b-0
          hover:bg-gray-50 transition-colors duration-150 px-1 -mx-1"
   x-show="activeKategori === 'semua' || activeKategori === '{{ $item['kategori'] }}'">

    {{-- Meta: badge + tanggal --}}
    <div class="flex items-center gap-2">
        <x-category-badge :kategori="$item['kategori']" />
        <span class="text-lg text-gray-500">{{ $item['tanggal'] }}</span>
    </div>

    {{-- Judul --}}
    <p class="text-lg font-bold text-blue-700
          underline  decoration-blue-700 underline-offset-4
          leading-snug
          group-hover:text-blue-900
          transition-colors duration-150 group-hover:decoration-2 group-hover:decoration-blue-900 ">
    {{ $item['judul'] }}
</p>

    {{-- Excerpt --}}
    <p class="{{ $featured ? 'text-lg' : 'text-lg' }}
              text-gray-500 leading-relaxed line-clamp-2">
        {{ $item['excerpt'] }}
    </p>

</a>
