<div class="bg-white rounded-xl shadow p-4">
<div class="flex justify-between items-center mb-3">

    <div>
        <select wire:model.live="perPage" class="border p-2 rounded">
            <option value="10">10</option>
            <option value="25">25</option>
            <option value="50">50</option>
        </select>
    </div>

</div>
    <table class="w-full border-collapse text-center">
        <thead class="bg-gray-300 text-center">
        <tr>
        <th wire:click="sortBy('nama')" class="cursor-pointer p-3 text-sm font-semibold">
            Nama
            @if($sortField === 'nama')
                @if($sortDirection === 'asc')
                    ↑
                @else
                    ↓
                @endif
            @endif
        </th>
        <th wire:click="sortBy('created_at')" class="cursor-pointer p-3 text-sm font-semibold">
            Tanggal
            @if($sortField === 'created_at')
                @if($sortDirection === 'asc')
                    ↑
                @else
                    ↓
                @endif
            @endif
        </th>
        <th wire:click="sortBy('rt')" class="cursor-pointer p-3 text-sm font-semibold">
            RT
            @if($sortField === 'rt')
                @if($sortDirection === 'asc')
                    ↑
                @else
                    ↓
                @endif
            @endif
        </th>
        <th wire:click="sortBy('rt')" class="cursor-pointer p-3 text-sm font-semibold">
        Gender
        @if($sortField === 'gender')
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

        @foreach($pemohon as $item)

        <tr class="hover:bg-gray-50">

    <td class="p-3">
        {{ $item->nama }}
    </td>
    <td class="p-3">
        {{ $item->created_at->format('d-m-Y') }}
    </td>

    <td class="p-3">
        {{ $item->rt }}
    </td>

    <td class="p-3">
        {{ $item->gender }}
    </td>

<td class="p-3">
    <button class="border-black px-3 py-1 rounded">
        <x-heroicon-o-pencil-square class="w-5 h-5"/>
    </button>
    <button wire:click="delete({{ $item->id }})" class="border-black px-3 py-1 rounded">
        <x-heroicon-o-trash class="w-5 h-5"/>
    </button>
    <button class="border-black px-3 py-1 rounded">
        <x-heroicon-o-printer class="w-5 h-5"/>
    </button>
</td>

</tr>

@endforeach

</tbody>

</table>
<div class="mt-4">
{{ $pemohon->links() }}
</div>


</div>
