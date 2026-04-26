<div>
    <div class="flex justify-between items-center mb-3">
        <h1 class="text-lg font-bold">Berita</h1>
        <div class="button-group flex justify-center items-center">
            <button wire:click="openCreateModal" class="border-black px-3 py-1 rounded hover:bg-gray-200">
                <x-heroicon-o-plus class="w-5 h-5"/>
            </button>
        </div>
    </div>

        <table class="w-full border-collapse text-center">
        <thead>
            <tr class="bg-gray-200 ">
                <th wire:click="sortBy('title')" class="cursor-pointer p-3  text-sm font-semibold">
                Judul
                @if($sortField === 'title')
                    @if($sortDirection === 'asc')
                        ↑
                    @else
                        ↓
                    @endif
                @endif
                </th>
                <th wire:click="sortBy('created_at')" class="cursor-pointer p-3 text-sm font-semibold">
                Tanggal Terbit
                @if($sortField === 'created_at')
                    @if($sortDirection === 'asc')
                        ↑
                    @else
                        ↓
                    @endif
                @endif
                </th>
                <th wire:click="sortBy('views')" class="cursor-pointer p-3 text-sm font-semibold">
                Dikunjungi
                @if($sortField === 'views')
                    @if($sortDirection === 'asc')
                        ↑
                    @else
                        ↓
                    @endif
                @endif
            </th>
                <th class="p-3 text-sm font-semibold">Aksi</th>
            </tr>
        </thead>
         <tbody class="divide-y">

        @foreach($newsList as $item)

        <tr class="hover:bg-gray-50">

    <td class="p-3 ">
        {{ $item->title }}
    </td>
    <td class="p-3">
        {{ $item->formatted_date?? '' }}
    </td>

    <td class="p-3">
        {{ $item->views }}
    </td>

<td class="p-3">
    <button wire:click="openEditModal({{ $item->id }})" class="border-black px-3 py-1 rounded">
            <x-heroicon-o-pencil-square class="w-5 h-5"/>
    </button>
    <button wire:click="delete({{ $item->id }})" class="border-black px-3 py-1 rounded">
        <x-heroicon-o-trash class="w-5 h-5"/>
    </button>
</td>

</tr>

@endforeach

</tbody>
    </table>
    
    <div>
        {{ $newsList->links() }}
    </div>
    \

    {{-- Modal Create --}}
    @if($showCreateModal)
    <div class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg">Tambah Berita</h2>
                <button wire:click="closeModal" class="text-gray-400 hover:text-red-500 font-bold">✕</button>
            </div>
            <form wire:submit="store">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold">Judul</label>
                        <input wire:model="title" type="text" class="border p-2 rounded">
                        @error('title') <span class="text-red-500 ">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-bold">Gambar</label>
                        <input wire:model="picture" type="file" accept="image/*" class="border p-2 rounded">
                        @error('picture') <span class="text-red-500 ">{{ $message }}</span> @enderror
                        @if($picture)
                            <img src="{{ $picture->temporaryUrl() }}" class="h-32 object-cover rounded mt-2">
                        @endif
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-bold">Deskripsi</label>
                        <textarea wire:model="description" rows="4" class="border p-2 rounded resize-none"></textarea>
                        @error('description') <span class="text-red-500 ">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @endif

    {{-- Modal Edit --}}
    @if($showEditModal)
    <div class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg">Edit Berita</h2>
                <button wire:click="closeModal" class="text-gray-400 hover:text-red-500 font-bold">✕</button>
            </div>
            <form wire:submit="update">
                <div class="flex flex-col gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="font-bold">Judul</label>
                        <input wire:model="title" type="text" class="border p-2 rounded">
                        @error('title') <span class="text-red-500 ">{{ $message }}</span> @enderror
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-bold">Gambar</label>
                        <input wire:model="picture" type="file" accept="image/*" class="border p-2 rounded">
                        @error('picture') <span class="text-red-500 ">{{ $message }}</span> @enderror
                        {{-- Preview gambar lama --}}
                        @if(!$picture && $selectedId)
                            <img src="{{ asset('storage/' . App\Models\News::find($selectedId)?->picture) }}"
                                 class="h-32 object-cover rounded mt-2">
                        @endif
                        {{-- Preview gambar baru --}}
                        @if($picture)
                            <img src="{{ $picture->temporaryUrl() }}" class="h-32 object-cover rounded mt-2">
                        @endif
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="font-bold">Deskripsi</label>
                        <textarea wire:model="description" rows="4" class="border p-2 rounded resize-none"></textarea>
                        @error('description') <span class="text-red-500 ">{{ $message }}</span> @enderror
                    </div>
                    <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Update</button>
                </div>
            </form>
        </div>
    </div>
    @endif

<div class="edit-container">
            <form action="">
            <div>
                <div>

                </div>
            </div>
        </form>
    </div>

</div>
