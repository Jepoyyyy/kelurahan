<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pengantar Nikah</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="bg-gray-50 min-h-screen">

<div class="form-wrapper max-w-5xl">

    {{-- HEADER --}}
    <div class=" mb-12">
        <h1 class="text-3xl font-semibold">Form Pengantar Nikah</h1>
    </div>

    {{-- STEP INDICATOR --}}

<div style="background: yellow; padding:10px">
    STEP SEKARANG: {{ $step }}
</div>

    {{-- DINAMIC STEP CONTENT --}}
    <div>
    @if($step === 'overview')
            {{-- Form khusus untuk overview --}}
            <form method="POST" action="{{ route('form.final.submit') }}">
                @csrf
                @include("form.overview")

                <div class="pt-12">
                    <button type="submit" class="btn-primary">
                        Simpan Semua Data
                    </button>
                </div>
            </form>
        @elseif($step === 'success')
            {{-- Tanpa form untuk success --}}
            @include("form.success")
        @else
            {{-- Form untuk step biasa (pemohon/ayah/ibu) --}}
            <form method="POST" action="{{ url('/form/'.$step) }}">
                @csrf
                @include("form.$step")

                <div class="pt-12">
                    <button type="submit" class="btn-primary">Next</button>
                </div>
            </form>
        @endif
</div>

</div>

</body>
</html>
