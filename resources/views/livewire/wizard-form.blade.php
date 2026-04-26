<div class="form-wrapper max-w-5xl">

    {{-- Header --}}
    <div class="mb-12">
        <h1 class="text-3xl font-semibold">Form Pengantar Nikah</h1>
    </div>

    {{-- Step Indicator --}}
    <div class="flex items-center gap-2 mb-8">
        @foreach(['pemohon' => 'Pemohon', 'ayah' => 'Ayah', 'ibu' => 'Ibu', 'pasangan' => 'Pasangan', 'overview' => 'Ringkasan'] as $key => $label)
        <div class="flex items-center gap-2">
            <span class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold
                {{ $step === $key ? 'bg-blue-600 text-white' : 'bg-gray-200 text-gray-500' }}">
                {{ $loop->index + 1 }}
            </span>
            <span class="text-sm {{ $step === $key ? 'text-blue-600 font-semibold' : 'text-gray-400' }}">
                {{ $label }}
            </span>
            @if(!$loop->last)
                <span class="text-gray-300 mx-1">→</span>
            @endif
        </div>
        @endforeach
    </div>

    {{-- Error --}}
    @if(session('error'))
    <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
        {{ session('error') }}
    </div>
    @endif

    {{-- Step Content --}}
    @if($step === 'pemohon')
        @include('form.livewire.pemohon')
    @elseif($step === 'ayah')
        @include('form.livewire.ayah')
    @elseif($step === 'ibu')
        @include('form.livewire.ibu')
    @elseif($step === 'pasangan')
        @include('form.livewire.pasangan')
    @elseif($step === 'overview')
        @include('form.livewire.overview')
    @elseif($step === 'success')
        @include('form.livewire.success')
    @endif

    {{-- Navigasi --}}
    @if($step !== 'success')
    <div class="flex justify-between pt-8">
        @if($step !== 'pemohon' && $step !== 'overview')
        <button wire:click="prevStep" class="border border-gray-300 px-6 py-2 rounded-lg hover:bg-gray-50">
            ← Kembali
        </button>
        @else
        <div></div>
        @endif

        @if($step === 'overview')
        <button wire:click="finalSubmit" class="btn-primary">
            Simpan Semua Data
        </button>
        @else
        <button wire:click="nextStep" class="btn-primary">
            Selanjutnya →
        </button>
        @endif
    </div>
    @endif

</div>
