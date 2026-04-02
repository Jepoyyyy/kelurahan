@extends('dashboard')

@section('content')
    <h1 style="color: #333; font-size: 2rem; font-weight: bold;">Dashboard</h1>
    <x-dashboard-content.counter />
    <livewire:pemohon-table />
@endsection
