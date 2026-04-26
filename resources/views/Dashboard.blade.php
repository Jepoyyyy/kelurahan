<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css','resources/js/app.js','resources/js/calendarpicker.js'])
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="dashboard-wrapper min-h-screen" x-data="{ sidebarOpen: true }">
        <div class="dashboard-body flex flex-row min-h-screen">

            {{-- Sidebar --}}
            <div class="shrink-0 transition-all duration-300 overflow-hidden"
                :class="sidebarOpen ? 'w-64' : 'w-16'">
                <x-dashboard.sidebar />
            </div>

            {{-- Content --}}
            <div class="w-full m-4 p-4 rounded-2xl bg-white min-w-0">
                {{ $slot ?? '' }}
                @yield('content')
            </div>

        </div>
    </div>
    @livewireScripts
</body>
</html>
