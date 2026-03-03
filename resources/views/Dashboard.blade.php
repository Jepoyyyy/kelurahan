<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')



    <title>Dashboard</title>
</head>
<body>
<div class="dashboard-wrapper bg-[#37353E]">
    <div class="dashboard-body flex flex-row">

        <div class="dashboard-sidebar-wrapper ">
            <x-dashboard.sidebar/>
        </div>
        <div class="dashboard-content-wrapper w-full m-4 p-4 rounded-2xl bg-white">
            @yield('content')
        </div>


</div>

</div>
</body>
</html>
