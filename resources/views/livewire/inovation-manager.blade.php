<div>
    <div class="flex items-center gap-4">
        <span class="text-gray-500 font-medium">
            Inovasi
        </span>
    </div>
    <div
    x-data
    x-on:alert-success.window="
        Swal.fire({
            icon: $event.detail.type,
            title: $event.detail.message,
            timer: 2000,
            timerProgressBar: true,
            showConfirmButton: false,
            toast: true,
            position: 'bottom-end',
        })
    "
></div>
    <button wire:click="openCreateModal" class="border-black px-3 py-1 rounded hover:bg-gray-200">
                <x-heroicon-o-plus class="w-5 h-5"/>
            </button>
    @if($showCreateModal)
    <div class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg">
                    {{ $modalMode === 'create' ? 'Tambah Inovasi' : 'Edit Inovasi' }}
                </h2>
                <button wire:click="closeModal" class="text-gray-400 hover:text-red-500 font-bold">✕</button>
            </div>
    <form wire:submit="storeinnovation" class="mt-4">
            <div class="relative">
                <input type="text" id="namaprogramkerja"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm
               text-heading bg-transparent
               rounded-md border border-gray-300
               appearance-none focus:outline-none focus:ring-0
               focus:border-blue-500 peer"
                    placeholder=" " wire:model="namaprogramkerja"/>

                <label for="namaprogramkerja"
                    class="pointer-events-auto absolute text-sm text-gray-500 duration-300 transform
               -translate-y-4 scale-75 top-2 z-10 origin-left
               bg-white px-1
               left-2
               peer-placeholder-shown:scale-100
               peer-placeholder-shown:top-1/2
               peer-placeholder-shown:-translate-y-1/2
               peer-focus:top-2
               peer-focus:scale-75
               peer-focus:-translate-y-4">
                    Nama Program Kerja
                </label>
                @error('namaprogramkerja') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="relative mt-3">
                <input type="text" id="deskripsiprogramkerja"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm
               text-heading bg-transparent
               rounded-md border border-gray-300
               appearance-none focus:outline-none focus:ring-0
               focus:border-blue-500 peer"
                    placeholder=" " wire:model="deskripsiprogramkerja"/>

                <label for="deskripsiprogramkerja"
                    class="absolute text-sm text-gray-500 duration-300 transform
               -translate-y-4 scale-75 top-2 z-10 origin-left
               bg-white px-1
               left-2
               peer-placeholder-shown:scale-100
               peer-placeholder-shown:top-1/2
               peer-placeholder-shown:-translate-y-1/2
               peer-focus:top-2
               peer-focus:scale-75
               peer-focus:-translate-y-4">
                    Deskripsi
                </label>
                @error('deskripsiprogramkerja') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
        <span wire:loading wire:target="storeinnovation">
        <svg class="animate-spin h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
        </svg>
        Menyimpan...
    </span>
    <span wire:loading.remove wire:target="storeinnovation">Submit</span>
</button>
    </div>
    </form>
    </div>
    </div>
    @endif

<div class="space-y-2">
    @foreach ($innovationList as $innovation)
    <div class="border border-gray-200 rounded-lg bg-white shadow-sm ">

        {{-- Row Utama --}}
        <div class="grid grid-cols-[auto_1fr_auto_auto] items-center gap-4 px-4 py-3 border-b border-gray-300">

            {{-- Toggle --}}
            <button wire:click="toggleAccordion({{ $innovation->id }})"
                    class="text-gray-400 hover:text-gray-600 transition-colors">
                <x-heroicon-o-bars-3
                    class="w-5 h-5 transition-transform duration-300 {{ isset($openAccordions[$innovation->id]) ? 'rotate-90' : '' }}"/>
            </button>

            {{-- Nama --}}
            <div class="text-left">
                <p class="font-medium text-sm text-gray-800">{{ $innovation->title }}</p>
            </div>

            {{-- Jumlah Update --}}
            <div class="text-sm text-gray-500 whitespace-nowrap">
                {{ $innovation->updates_count > 0 ? $innovation->updates_count . ' update' : 'Belum ada update' }}
            </div>

            {{-- Aksi --}}
            <div class="flex items-center gap-1">
                {{-- Lihat --}}
                <div class="relative group">
                    <a href="{{ route('innovation.detail', $innovation->slug) }}"
                       class="inline-flex items-center justify-center border border-gray-200 rounded p-1.5 hover:bg-gray-50 transition-colors">
                        <x-heroicon-o-eye class="w-4 h-4"/>
                    </a>
                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none z-10">
                        Lihat Detail
                    </span>
                </div>

                {{-- Tambah Update --}}
                <div class="relative group">
                    <button wire:click="openUpdateCreateModal({{ $innovation->id }})"
                            class="inline-flex items-center justify-center border border-gray-200 rounded p-1.5 hover:bg-gray-50 transition-colors">
                        <x-heroicon-o-document-plus class="w-4 h-4"/>
                    </button>
                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none z-10">
                        Tambah Update
                    </span>
                </div>

                {{-- Edit --}}
                <div class="relative group">
                    <button wire:click="openEditModal({{ $innovation->id }})"
                            class="inline-flex items-center justify-center border border-gray-200 rounded p-1.5 hover:bg-gray-50 transition-colors">
                        <x-heroicon-o-pencil-square class="w-4 h-4"/>
                    </button>
                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none z-10">
                        Edit Data
                    </span>
                </div>

                {{-- Hapus --}}
                <div class="relative group">
                    <button x-on:click="
                        Swal.fire({
                            title: 'Yakin?',
                            text: 'Data akan dihapus permanen',
                            icon: 'warning',
                            showCancelButton: true,
                        }).then(result => {
                            if (result.isConfirmed) {
                                $wire.delete({{ $innovation->id }})
                            }
                        })"
                        class="inline-flex items-center justify-center border border-gray-200 rounded p-1.5 hover:bg-red-50 hover:text-red-500 hover:border-red-200 transition-colors">
                        <x-heroicon-o-trash class="w-4 h-4"/>
                    </button>
                    <span class="absolute -top-8 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-xs rounded px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap pointer-events-none z-10">
                        Hapus Data
                    </span>
                </div>
            </div>
        </div>

        {{-- Accordion Content --}}
        @if(isset($openAccordions[$innovation->id]))
        <div class="rounded-b shadow-2xl border-gray-200 bg-gray-100 px-4 py-3">
            @if($this->getUpdates($innovation->id)->count() > 0)
            <div class="space-y-2">
                @foreach($this->getUpdates($innovation->id) as $update)
                <div class="flex justify-between items-center bg-white rounded-lg px-3 py-2.5 border border-gray-100 shadow-sm">
                    <div>
                        <p class="text-sm font-medium text-gray-700">{{ $update->title }}</p>
                        <p class="text-xs text-gray-400 mt-0.5">
                            {{ \Carbon\Carbon::parse($update->activity_date)->format('d F Y') }}
                        </p>
                    </div>
                    <div class="flex gap-2">
                        <button wire:click="openUpdateEditModal({{ $update->id }})" class="text-xs px-2 py-1 rounded border border-blue-200 text-blue-500 hover:bg-blue-50 transition-colors">
                            Edit
                        </button>
                        <button x-on:click="
                        Swal.fire({
                            title: 'Yakin?',
                            text: 'Data akan dihapus permanen',
                            icon: 'warning',
                            showCancelButton: true,
                        }).then(result => {
                            if (result.isConfirmed) {
                                $wire.deleteUpdate({{ $update->id }})
                            }
                        })"
                        class="text-xs px-2 py-1 rounded border border-red-200 text-red-500 hover:bg-red-50 transition-colors">
                            Hapus
                        </button>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <p class="text-sm text-gray-400 text-center py-4">Belum ada update.</p>
            @endif
        </div>
        @endif

    </div>
    @endforeach
</div>

    @if($showUpdateModal)
    <div class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg">Tambah Berita</h2>
                <button wire:click="closeModal" class="text-gray-400 hover:text-red-500 font-bold">✕</button>
            </div>
        <form wire:submit="storeUpdate" class="mt-4">
            <div class="relative">
                <input type="text" id="namaupdate"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm
               text-heading bg-transparent
               rounded-md border border-gray-300
               appearance-none focus:outline-none focus:ring-0
               focus:border-blue-500 peer"
                    placeholder=" " wire:model="namaupdate"/>

                <label for="floating_outlined"
                    class="absolute text-sm text-gray-500 duration-300 transform
               -translate-y-4 scale-75 top-2 z-10 origin-left
               bg-white px-1
               left-2
               peer-placeholder-shown:scale-100
               peer-placeholder-shown:top-1/2
               peer-placeholder-shown:-translate-y-1/2
               peer-focus:top-2
               peer-focus:scale-75
               peer-focus:-translate-y-4">
                    Judul Artikel perkembangan
                </label>
                @error('namaupdate') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div class="relative mt-3">
                <input type="text" id="deskripsiprogramkerja"
                    class="block px-2.5 pb-2.5 pt-4 w-full text-sm
               text-heading bg-transparent
               rounded-md border border-gray-300
               appearance-none focus:outline-none focus:ring-0
               focus:border-blue-500 peer"
                    placeholder=" " wire:model="deskripsiupdate"/>

                <label for="floating_outlined"
                    class="absolute text-sm text-gray-500 duration-300 transform
               -translate-y-4 scale-75 top-2 z-10 origin-left
               bg-white px-1
               left-2
               peer-placeholder-shown:scale-100
               peer-placeholder-shown:top-1/2
               peer-placeholder-shown:-translate-y-1/2
               peer-focus:top-2
               peer-focus:scale-75
               peer-focus:-translate-y-4">
                    Deskripsi
                </label>
                @error('deskripsiprogramkerja') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>
            <div
            x-data="datepicker()"
            class="relative">



    <div class="relative mt-3">
        {{-- Icon kalender --}}
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>

        <input
            x-ref="input"
            wire:model="tanggalupdate"
            type="text"
            readonly
            placeholder="Pilih tanggal..."
            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm
                   cursor-pointer bg-white
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                   hover:border-blue-400 transition-colors duration-200">
    </div>
    @error('tanggalupdate')
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
    @enderror
</div>
     <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center">
                <input
                    type="file"
                    wire:model="media"
                    multiple
                    accept="image/*,video/*"
                    class="hidden"
                    id="mediaInput"
                    {{ $mediaCount >= 4 ? 'disabled' : '' }}
                />
                <label for="mediaInput" class="cursor-pointer">
                    <x-heroicon-o-cloud-arrow-up class="w-10 h-10 mx-auto text-gray-400"/>
                    <p class="text-sm text-gray-500 mt-2">Klik untuk upload gambar/video</p>
                    <p class="text-xs text-gray-400">Max 4 file • JPG, PNG, MP4, MOV • Max 50MB/file</p>
                </label>
            </div>

            {{-- Counter --}}
            <div class="flex justify-between items-center mt-3">
                <span class="text-sm text-gray-500">File terpilih:</span>
                <span class="text-sm font-bold {{ $mediaCount >= 4 ? 'text-red-500' : 'text-blue-500' }}">
                    {{ $mediaCount }}/4
                </span>
            </div>

            {{-- Progress Bar --}}
            <div class="w-full bg-gray-200 rounded-full h-2 mt-1">
                <div
                    class="h-2 rounded-full transition-all duration-300 {{ $mediaCount >= 4 ? 'bg-red-500' : 'bg-blue-500' }}"
                    style="width: {{ ($mediaCount / 4) * 100 }}%"
                ></div>
            </div>

            {{-- Preview Files --}}
            @if($mediaCount > 0)
<div class="mt-4 grid grid-cols-2 gap-2">
    @foreach($existingMedia as $index => $file)
<div class="relative border rounded-lg">

    @if($file['file_type'] === 'image')
        <img src="{{ asset('storage/' . $file['file_path']) }}" class="w-full h-24 object-cover">
    @else
        <div class="w-full h-24 bg-gray-100 flex items-center justify-center">
            <x-heroicon-o-film class="w-8 h-8 text-gray-400"/>
        </div>
    @endif

    <button
        type="button"
        wire:click="removeExistingMedia({{ $index }})"
        class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5"
    >✕</button>

</div>
@endforeach
    @foreach($media as $index => $file)
    <div class="relative border rounded-lg">

        {{-- Preview gambar --}}
        @if(str_contains($file->getMimeType(), 'image'))
            <img src="{{ $file->temporaryUrl() }}" class="w-full h-24 object-cover">
        @else
            {{-- Preview video --}}
            <div class="w-full h-24 bg-gray-100 flex items-center justify-center">
                <x-heroicon-o-film class="w-8 h-8 text-gray-400"/>
                <span class="text-xs text-gray-500 ml-1">{{ $file->getClientOriginalName() }}</span>
            </div>
        @endif

        {{-- Tombol hapus HARUS di dalam div.relative --}}
        <button
            type="button"
            wire:click="removeMedia({{ $index }})"
            class="absolute top-1 right-1 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-700"
        >✕</button>

    </div>
    @endforeach
</div>
@endif
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">
        <span wire:loading wire:target="storeUpdate">
        <svg class="animate-spin h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
        </svg>
        Menyimpan...
    </span>
    <span wire:loading.remove wire:target="storeinnovation">Submit</span>
</button>
    </div>
    </form>
    </div>
    </div>
    @endif
    </div>

