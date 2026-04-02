<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Form Pengantar Nikah</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen">
    <div class="form-wrapper max-w-5xl">
        {{-- HEADER --}}
        <div class=" mb-12">
            <h1 class="text-3xl font-semibold">Form Pengantar Nikah</h1>
        </div>
        <div>
            <form method="POST" action="{{ route('form.final.submit') }}">
                @csrf

                <div class="pt-12">
                    <button type="submit" class="btn-primary">
                        Simpan Semua Data
                    </button>
                </div>
            </form>
        </div>

    </div>

</body>

</html>
