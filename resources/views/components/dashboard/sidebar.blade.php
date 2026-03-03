<div class="sidebar-content ">
        <div class="sidebar-profile-container flex  ">
            <div class=" flex flex-col justify-center items-center w-full px-2 mt-4">
                <span class="bg-black h-30 w-30 rounded-full "></span>
                <span class="text-white flex py-1">Username</span>
                <span class="text-white flex">Nama Pengguna</span>
            </div>
        </div>
        <div class="sidebar-items-container flex p-4 ">
            <ul class="flex flex-col w-full">
                <li class="sidebar-item ">
                    <a href="{{ route('dashboard') }}" class="">Dashboard</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard') }}">Data RT</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('dashboard') }}">Setting Surat</a>
                </li>
                <li class="sidebar-item">
                    <a href="{{ route('content-man') }}">Manajemen Konten</a>
                </li>
            </ul>
        </div>
</div>
