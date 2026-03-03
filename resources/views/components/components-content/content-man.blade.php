@extends('dashboard')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto bg-white p-6 rounded shadow">
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
                <label for="desc" class="font-bold">Deskripsi</label>
                <textarea id="desc" name="desc" rows="4" class="border p-2 rounded resize-none text-justify" required></textarea>
            </div>
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-700">Submit</button>
        </div>
    </form>
@endsection
