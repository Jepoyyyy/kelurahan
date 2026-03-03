<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kelurahan Simpang III Sipin</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
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
        <div class="corousel-item  bg-gray h-150 w-full bg-gray-400 flex px-4 border-b items-center justify-between ">
                <button class="bg-gray-300 p-5 rounded"><</button>
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
            <div class="calendar-content bg-gray-300 h-80 flex items-center justify-center">
                <p>Kalender Kegiatan</p>
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
        <div class="news-wrapper bg-amber-600 w-full flex flex-col p-4 mb-4 border-b items-center justify-between">
            <div class="news-header  py-2">
                <h1 class="text-2xl font-bold">Berita Terkini</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem facere ut tenetur quaerat magnam, aperiam rem ab repellat expedita qui cupiditate pariatur voluptatum laudantium, et, quibusdam architecto aliquam sequi maiores.</p>
            </div>
            <div class="news-content ">
                <div class="card border rounded-lg h-130 w-100 items-center justify-between p-4 ">
                    <div class="card-header ">
                        <div class="card-title font-bold text-lg mb-2">Berita Terbaru

                        </div>
                        <div class="card-pic">
                            <img src="/stock1.jpg" alt="" class="h-60 mb-2">
                        </div>
                    </div>
                    <div class="card-desc overflow-hidden line-clamp-8 text-justify">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci aperiam voluptate porro et assumenda suscipit, qui quaerat recusandae dolorum reiciendis. Quibusdam explicabo optio dignissimos laborum possimus iste fuga. Error, dolores eos incidunt necessitatibus pariatur odit, maiores voluptate eligendi quidem perferendis omnis placeat temporibus. Aut expedita mollitia earum id nostrum. Voluptatum iste sint veritatis iure ipsa odit culpa nisi soluta harum, vel doloremque nihil temporibus voluptatibus, deserunt minima quisquam corrupti quibusdam eligendi nobis deleniti autem voluptas fuga esse recusandae! Officia quis inventore fuga amet! Quod obcaecati non, rem accusamus quibusdam in beatae commodi molestiae nemo officiis praesentium. Exercitationem enim nemo iusto ipsa soluta nostrum voluptatem dolorum earum minima! Natus, vitae nihil. Perspiciatis, odit? Quae at accusantium mollitia quisquam quidem architecto reiciendis sint. Mollitia optio laborum, ab hic quibusdam eligendi nemo eum, aut ipsum commodi assumenda ducimus, non itaque similique nobis? Aliquam est perspiciatis dolorum dignissimos, incidunt earum. Modi, fugit enim corporis voluptatibus reprehenderit officiis tempore culpa maiores nihil suscipit cupiditate eos ipsam libero doloribus doloremque reiciendis, eligendi provident atque numquam, asperiores veritatis sint harum temporibus! Aliquam ratione consequuntur dolor doloribus ab. Aliquid blanditiis qui molestiae ullam ad voluptatum doloremque fuga sed voluptate in placeat, repudiandae alias minima corrupti dignissimos voluptatem aperiam.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footer bg-green-300">

    </div>
</div>
</body>
</html>
