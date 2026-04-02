<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelurahan Simpang III Sipin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/calendar.js'])
</head>

<body>
    <div class="wrapper min-h-screen w-full">
        <div class="header-wrapper ">
            <div class="headerinfo flex flex-row items-center justify-between bg-gray-300 px-14 py-6">
                <div class="flex flex-row justify-between items-center gap-2">
                    <img src="{{ asset('kotajambilogo.png') }}" class="w-32 md:w-48 lg:w-13 h-auto" alt="">
                    <div class="flex flex-col">
                        <h1 class="font-bold">Kelurahan Simpang III Sipin</h1>
                        <p>Kecamatan Kotabaru</p>
                    </div>
                </div>
                <div class="flex flex-row gap-2">
                    <p>Jam Layanan:<br> Senin - Jumat 08:00 - 16:00 WIB</p>
                </div>
            </div>
            <div class="navbar bg-blue-300 border-b ">

                <ul class="flex flex-row items-center justify-center">
                    <li class=" px-4 py-2"><a href="{{ route('landing') }}">Home</a></li>
                    <li class=" px-4 py-2"><a href="#">Layanan</a></li>
                    <li class=" px-4 py-2"><a href="#">Kontak</a></li>
                </ul>

            </div>

        </div>
        <div class="corousel">
            <div
                class="corousel-item  bg-gray h-150 w-full bg-gray-400 flex px-4 border-b items-center justify-between ">
                <button class="bg-gray-300 p-5 rounded"> <
                    </button>
                        <h1 class="text-4xl font-bold text-white">Corousel</h1>
                        <button class="bg-gray-300 p-5 rounded">></button>
            </div>
        </div>
        <div class="body">
            <div class="head-profile-con border-">
                <div class="head-profile flex flex-col justify-center items-center">
                    <img class="m-4 h-70" src="/Prof1.jpg" alt="">
                    <h1 class="text-2xl font-bold ">M. Andi</h1>
                    <h1 class="mb-4">Lurah Simpang III Sipin</h1>
                </div>
                <div class="calender-sec-wrapper p-5">
                    <div class="calendar-header">
                        <h1 class="text-2xl font-bold">Kalender Kegiatan</h1>
                    </div>
                    <div class="cal-conwrapper bg-gray-300 h-120 flex items-center justify-between">
                        <div class="flex flex-col justify-center">
                            <div class="calendar-content  ">
                                <div id='calendar' class="m-5 h-80 w-150"></div>
                            </div>
                            <div class="calendar-legends flex  items-center justify-center gap-5 p-3 mt-4">
                                <div class="flex flex-col items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-blue-500 shrink-0"></span>
                                    <span class="text-sm text-gray-600">RT</span>
                                </div>
                                <div class="flex flex-col items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-yellow-500 shrink-0"></span>
                                    <span class="text-sm text-gray-600">Kecamatan</span>
                                </div>
                                <div class="flex flex-col items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-green-500 shrink-0"></span>
                                    <span class="text-sm text-gray-600">Kota</span>
                                </div>
                                <div class="flex flex-col items-center gap-2">
                                    <span class="w-3 h-3 rounded-full bg-gray-400 shrink-0"></span>
                                    <span class="text-sm text-gray-600">Umum</span>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="map-sec-wrapper p-5">
                <div class="map-header">
                    <h1 class="text-2xl font-bold">Peta Kelurahan</h1>
                </div>
                <div class="map-content ">
                    <div class="map-container">
                        //map here
                        <div class="map-info">
                            <h1 class=" ">Informasi Kelurahan</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, voluptate.</p>

                        </div>
                    </div>

                </div>
            </div>
            <div class="news-wrapper w-full flex flex-col p-4 mb-4 border-b items-center justify-between">
                <div class="news-headerpy-2">
                    <h1 class="text-2xl font-bold">Berita Terkini</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem facere ut tenetur quaerat
                        magnam, aperiam rem ab repellat expedita qui cupiditate pariatur voluptatum laudantium, et,
                        quibusdam architecto aliquam sequi maiores.</p>
                </div>
                <div class="news-content flex flex-col gap-4 mt-4">
                    @forelse($newsList as $news)
                        <div class="card border-b border-gray-400  w-full flex flex-row  gap-4 p-4">
                            <div class="card-pic shrink-0 w-64 h-48 overflow-hidden  rounded-md">
                                <img src="{{ asset('storage/' . $news->picture) }}" alt="{{ $news->title }}"
                                    class="w-full h-full object-cover object-center hover:scale-105 transition-transform duration-300">
                            </div>
                            <div class="card-data flex flex-col flex-1">
                                <div class="card-title font-bold text-lg mb-2">
                                    {{ $news->title }}
                                </div>
                                <div class="card-date text-sm text-gray-500">
                                    {{ $news->formatted_date }}
                                </div>
                                <div class="card-desc overflow-hidden line-clamp-5 text-justify">
                                    <p>{{ $news->description }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Belum ada berita.</p>
                    @endforelse
                </div>

            </div>
        </div>
        <div class="footer bg-green-300">

        </div>
    </div>
</body>

</html>
