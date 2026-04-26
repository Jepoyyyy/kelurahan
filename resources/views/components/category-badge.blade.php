@props(['kategori'])

@php
$map = [
    'berita'      => ['label' => 'Berita',      'class' => 'bg-blue-50 text-blue-800'],
    'inovasi'     => ['label' => 'Inovasi',     'class' => 'bg-green-50 text-green-800'],
    'pengumuman'  => ['label' => 'Pengumuman',  'class' => 'bg-yellow-50 text-yellow-800'],
    'kegiatan'    => ['label' => 'Kegiatan',    'class' => 'bg-indigo-50 text-indigo-800'],
    'lainnya'     => ['label' => 'Lainnya',     'class' => 'bg-gray-100 text-gray-700'],
];
$config = $map[$kategori] ?? $map['lainnya'];
@endphp

<span class="inline-block text-[11px] font-semibold px-2 py-0.5 {{ $config['class'] }}">
    {{ $config['label'] }}
</span>
 