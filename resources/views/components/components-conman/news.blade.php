<div>
    <div class="button-group">
        <h1>Berita</h1>
        <button class="border-2 rounded-xl p-2 text-lg" type="button" id="btn-open-create">
            <x-heroicon-o-plus class="w-5 h-5"/>
        </button>
    </div>
{{-- Overlay sekaligus container modal --}}
<div id="modal-create" class="hidden fixed inset-0  backdrop-blur-sm flex items-center justify-center z-50">

    {{-- Kotak modal --}}
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">

        {{-- Tombol X --}}
        <button type="button" id="btn-close-create" class="float-right font-bold text-gray-500 hover:text-red-500">✕</button>

        {{-- Form — sekarang tidak perlu class hidden, max-w, shadow, bg sendiri --}}
        @if(session('success'))
    <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif
    <form action="{{ route('content-man.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        @csrf
        <div class="flex flex-col gap-6">
            <div class="flex flex-col gap-2">
                <label for="title" class="font-bold">Judul Berita</label>
                <input type="text" id="title" name="title" class="border p-2 rounded" required>
            </div>
            <div class="flex flex-col gap-2">
                <label for="picture" class="font-bold">Gambar Berita</label>
                <input type="file" id="picture" name="picture" accept="image/*" class="border p-2 rounded">
            </div>
            <div class="flex flex-col gap-2">
                <label for="description" class="font-bold">Deskripsi</label>
                <textarea id="description" name="description" rows="4" class="border p-2 rounded resize-none text-justify" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
        </div>
    </form>

    </div>
</div>

</div>
<script>
const btnOpen = document.getElementById('btn-open-create');
const btnClose = document.getElementById('btn-close-create');
const modal   = document.getElementById('modal-create');

btnOpen.addEventListener('click', function() {
    modal.classList.remove('hidden');
});
btnClose.addEventListener('click', function() {
    modal.classList.add('hidden');
});
</script>

