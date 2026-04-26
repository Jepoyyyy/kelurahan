<div>
    <button wire:click="openCreateModal" class="border-black px-3 py-1 rounded hover:bg-gray-200">
                <x-heroicon-o-plus class="w-5 h-5"/>
            </button>
    @if($showCreateModal)
    <div class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <div class="flex justify-between items-center mb-4">
                <h2 class="font-bold text-lg">Tambah Berita</h2>
                <button wire:click="closeModal" class="text-gray-400 hover:text-red-500 font-bold">✕</button>
            </div>
    <form wire:submit="store">
        @error('namaevent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        @error('tanggalevent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        @error('jenisevent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        @error('lokasievent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <div class="mb-4">
            <label for="namaeventlb" class="block text-sm font-medium text-gray-700">Nama Acara</label>
            <input type="text" id="namaevent" wire:model="namaevent" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div
            x-data="datepicker()"
            class="relative">

    <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>

    <div class="relative">
        {{-- Icon kalender --}}
        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
            <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
            </svg>
        </div>

        <input
            x-ref="input"
            wire:model="tanggalevent"
            type="text"
            readonly
            placeholder="Pilih tanggal..."
            class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm
                   cursor-pointer bg-white
                   focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500
                   hover:border-blue-400 transition-colors duration-200">
    </div>

    @error('tanggalevent')
        <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
    @enderror
</div>
        <div class="mb-4">
            <label for="jenisevent" class="block text-sm font-medium text-gray-700">Jenis Acara</label>
            <select id="jenisevent" wire:model="jenisevent" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
                <option value="umum">Umum</option>
                <option value="rt">RT</option>
                <option value="kelurahan">Kelurahan</option>
                <option value="kecamatan">Kecamatan</option>
            </select>
        </div>
        <div class="mb-4">
            <label for="lokasievent" class="block text-sm font-medium text-gray-700">Lokasi</label>
            <input type="text" id="lokasievent" wire:model="lokasievent" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        <span wire:loading wire:target="store">
        <svg class="animate-spin h-4 w-4 inline" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z"></path>
        </svg>
        Menyimpan...
    </span>
    <span wire:loading.remove wire:target="store">Submit</span>
</button>
    </form>
    </div>
    </div>
    @endif
    <div>
    {{-- Alert --}}
    <div
        x-data="{ show: false, message: '' }"
        x-on:alert-success.window="show = true; message = $event.detail.message; setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition
        class="bg-green-100 text-green-700 p-3 rounded mb-4">
        <span x-text="message"></span>
    </div>
</div>

<table>
    <thead class="border-b">
        <tr>
            <th class=" px-4 py-2">Nama Acara</th>
            <th class=" px-4 py-2">Tanggal</th>
            <th class=" px-4 py-2">Jenis Acara</th>
            <th class=" px-4 py-2">Lokasi</th>
        </tr
    </thead>
    <tbody class="divide-y">
        @foreach($eventList as $event)
        <tr>
            <td class=" px-4 py-2">{{ $event->nama }}</td>
            <td class=" px-4 py-2">{{ $event->formatted_date }}</td>
            <td class=" px-4 py-2">{{ $event->lokasi }}</td>
            <td class=" px-4 py-2">{{ $event->jenis }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
<div>
    {{ $eventList->links() }}
</div>
</div>
