<div>

    <form wire:submit="store">
        @error('namaevent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
@error('tanggalevent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
@error('jenisevent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
@error('lokasievent') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        <div class="mb-4">
            <label for="namaeventlb" class="block text-sm font-medium text-gray-700">Nama Acara</label>
            <input type="text" id="namaevent" wire:model="namaevent" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="tanggalevent" class="block text-sm font-medium text-gray-700">Tanggal</label>
            <input type="date" id="tanggalevent" wire:model="tanggalevent" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500">
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

    <form wire:submit="store">
        {{-- isi form --}}
    </form>
</div>
</div>
