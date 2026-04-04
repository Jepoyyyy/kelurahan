@extends('dashboard')

@section('content')
<div class="flex flex-row gap-8">
    <div class="flex-1 min-w-0">
        <livewire:newsmanager />
    </div>
    <div class="flex-1 min-w-0">
        <livewire:eventmanager />
    </div>
</div>
@endsection
