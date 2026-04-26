<div class="sidebar-content h-full bg-zinc-800 flex flex-col">
    {{-- Tombol toggle --}}
    <div class="flex items-center px-3 justify-center">

    {{-- Spacer yang melebar/menyempit --}}
    <div class="transition-all duration-300 overflow-hidden"
        :class="sidebarOpen ? 'w-full' : 'w-0'">
    </div>

    {{-- Tombol toggle — selalu tampil --}}
    <button @click="sidebarOpen = !sidebarOpen"
        class="text-white mt-4 rounded hover:bg-zinc-600 transition shrink-0">
        <x-heroicon-o-bars-3 class="w-5 h-5 transition-transform duration-500"
        ::class="sidebarOpen ? 'rotate-0' : 'rotate-90'"/>

    </button>
</div>

    {{-- Profile --}}
    <div class="flex flex-col  items-center px-2 mt-4 overflow-hidden">
        <span class="bg-black h-15 w-15 rounded-full shrink-0"
            :class="sidebarOpen ? 'max-w-15 max-h-15' : 'max-w-10 max-h-10'">
            <img class="h-full w-full object-cover rounded-full" src="/Prof1.jpg" alt="Profile Picture">
        </span>
        <span class="text-white py-1 whitespace-nowrap overflow-hidden transition-all duration-300"
            :class="sidebarOpen ? 'opacity-100 max-h-10' : 'opacity-0 max-h-0'">
            Nama Pengguna
        </span>
        <span class="text-white whitespace-nowrap overflow-hidden transition-all duration-300"
            :class="sidebarOpen ? 'opacity-100 max-h-10' : 'opacity-0 max-h-0'">
            Jabatan
        </span>
    </div>

    {{-- Menu --}}
    <div class="sidebar-items-container flex-col justify-center items-center w-full mt-4">
        <ul class="flex flex-col w-full justify-center">
            {{-- Item biasa --}}
            <li>
                <a href="{{ route('dashboard') }}"
                class="sidebar-item flex flex-row items-center py-2 rounded-lg
                    text-white hover:bg-zinc-600 transition cursor-pointer
                    {{ request()->routeIs('dashboard') ? 'bg-zinc-600' : 'bg-transparent' }}"
                :class="sidebarOpen ? 'gap-3 px-3' : 'gap-0 justify-center px-0 py-3'">
                <x-heroicon-m-home class="w-5 h-5 shrink-0"/>
                <span class="whitespace-nowrap overflow-hidden transition-all duration-300"
                    :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0'">
                    Dashboard
                </span>
</a>
            </li>

            <li>
                <a href="{{ route('dashboard') }}"
                    class="sidebar-item flex flex-row items-center py-2 rounded-lg
                           text-white hover:bg-zinc-600 transition cursor-pointer"
                           :class="sidebarOpen ? 'gap-3 px-3' : 'gap-0 justify-center px-0 py-3'">
                    <x-heroicon-s-user class="w-5 h-5 shrink-0"/>
                    <span class="whitespace-nowrap overflow-hidden transition-all duration-300"
                        :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0'">
                        Data RT
                    </span>
                </a>
            </li>

            <li>
                <a href="{{ route('dashboard') }}"
                    class="sidebar-item flex flex-row items-center py-2 rounded-lg
                           text-white hover:bg-zinc-600 transition cursor-pointer"
                           :class="sidebarOpen ? 'gap-3 px-3' : 'gap-0 justify-center px-0 py-3'">
                    <x-heroicon-s-envelope class="w-5 h-5 shrink-0"/>
                    <span class="whitespace-nowrap overflow-hidden transition-all duration-300"
                        :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0'">
                        Surat
                    </span>
                </a>
            </li>
            <li>
                <a href="{{ route('dashboard') }}"
                    class="sidebar-item flex flex-row items-center py-2 rounded-lg
                           text-white hover:bg-zinc-600 transition cursor-pointer"
                           :class="sidebarOpen ? 'gap-3 px-3' : 'gap-0 justify-center px-0 py-3'">
                    <x-heroicon-s-envelope class="w-5 h-5 shrink-0"/>
                    <span class="whitespace-nowrap overflow-hidden transition-all duration-300"
                        :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0'">
                        Kepegawaian
                    </span>
                </a>
            </li>

            {{-- Item dengan child --}}
            <li x-data="{ childOpen: {{ request()->routeIs('content.*') ? 'true' : 'false' }} }">
                <div @click="sidebarOpen ? childOpen = !childOpen : null"
                    class="sidebar-item flex flex-row items-center py-2 rounded-lg
                           text-white hover:bg-zinc-600 transition cursor-pointer"
                           :class="{
        'gap-3 px-3': sidebarOpen,
        'gap-0 justify-center px-0 py-3': !sidebarOpen,

    }">
                    <x-heroicon-s-newspaper class="w-5 h-5 shrink-0"/>
                    <span class="whitespace-nowrap overflow-hidden transition-all duration-300"
                        :class="sidebarOpen ? 'opacity-100 w-auto' : 'opacity-0 w-0'">
                        Manajemen Konten
                    </span>
                    {{-- Arrow indicator --}}
                    <x-heroicon-o-chevron-down
                        class="w-4 h-4 shrink-0 transition-transform duration-300"
                        ::class="childOpen ? 'rotate-180' : ''"
                        x-show="sidebarOpen"/>
                </div>

                {{-- Child items --}}
                <div x-show="childOpen && sidebarOpen"
                    x-transition
                    class="ml-4 flex flex-col gap-1 mt-1">
                    <a href="{{ route('content.news') }}"
                        class="flex flex-row items-center gap-3 p-2 rounded-lg
                               text-zinc-300 hover:bg-zinc-600 hover:text-white transition text-sm
                               {{ request()->routeIs('content.news') ? 'bg-zinc-600' : '' }}">
                        <x-heroicon-o-newspaper class="w-4 h-4 shrink-0"/>
                        <span>Berita</span>
                    </a>
                    <a href="{{ route('content.events') }}"
                        class="flex flex-row items-center gap-3 p-2 rounded-lg
                               text-zinc-300 hover:bg-zinc-600 hover:text-white transition text-sm
                               {{ request()->routeIs('content.events') ? 'bg-zinc-600' : '' }}">
                        <x-heroicon-o-calendar class="w-4 h-4 shrink-0"/>
                        <span>Event</span>
                    </a>
                    <a href="{{ route('content.inovations') }}"
                        class="flex flex-row items-center gap-3 p-2 rounded-lg
                               text-zinc-300 hover:bg-zinc-600 hover:text-white transition text-sm
                               {{ request()->routeIs('content.inovations') ? 'bg-zinc-600' : '' }}">
                        <x-heroicon-o-light-bulb class="w-4 h-4 shrink-0"/>
                        <span>Inovasi</span>
                    </a>
                </div>
            </li>

        </ul>
    </div>
</div>
