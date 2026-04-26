{{--
    Component: x-event-jenis-badge
    Props:
      :jenis  — string, nilai dari kolom `jenis` di DB
               (rapat | sosial | administrasi | kesehatan | olahraga | lainnya)

    Usage:
      <x-event-jenis-badge :jenis="$event->jenis" />
      <x-event-jenis-badge jenis="rapat" />
--}}

@props(['jenis' => null])

@php
    $map = [
        'rapat'        => ['class' => 'text-[#1d4ed8] border-[#1d4ed8]',   'label' => 'Rapat'],
        'sosial'       => ['class' => 'text-[#059669] border-[#059669]',   'label' => 'Sosial'],
        'administrasi' => ['class' => 'text-[#7c3aed] border-[#7c3aed]',   'label' => 'Administrasi'],
        'kesehatan'    => ['class' => 'text-[#dc2626] border-[#dc2626]',   'label' => 'Kesehatan'],
        'olahraga'     => ['class' => 'text-[#d97706] border-[#d97706]',   'label' => 'Olahraga'],
    ];

    $key    = strtolower($jenis ?? '');
    $style  = $map[$key] ?? ['class' => 'text-[#374151] border-[#374151]', 'label' => 'Lainnya'];
@endphp

<span {{ $attributes->merge([
    'class' => 'inline-block font-mono text-[10px] font-medium tracking-[0.07em] uppercase
                px-1.5 py-0.5 border-[1.5px] leading-relaxed ' . $style['class']
]) }}>
    {{ $style['label'] }}
</span>
