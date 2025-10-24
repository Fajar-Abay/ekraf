<aside
    id="sidebar"
    class="fixed inset-y-0 left-0 bg-[#004E64] text-white w-64 transform transition-transform duration-300 ease-in-out z-50
            -translate-x-full lg:translate-x-0 lg:static lg:inset-0 flex flex-col"
        :class="{ '-translate-x-full': !openSidebar, 'translate-x-0': openSidebar }"
>
    <!-- Logo dan Judul -->
    <div class="flex items-center justify-center py-6 border-b border-teal-600">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-10 h-10 mr-2">
        <div class="text-sm font-semibold leading-tight text-center">
            EKONOMI KREATIF<br>SUMEDANG
        </div>
    </div>

    <!-- Navigasi Utama -->
    <nav class="flex-1 px-4 py-4 space-y-1 overflow-y-auto">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-[#007F8C]
            {{ request()->is('admin') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            <i class="fa-solid fa-house"></i> Beranda
        </a>

        <a href="{{ url('admin/tentang') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-[#007F8C]
            {{ request()->is('admin/tentang') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            <i class="fa-solid fa-circle-info"></i> Tentang
        </a>

        <a href="{{ url('admin/artikel') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-[#007F8C]
            {{ request()->is('admin/artikel*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            <i class="fa-solid fa-newspaper"></i> Artikel
        </a>

        <a href="{{ url('admin/subsektor') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-[#007F8C]
            {{ request()->is('admin/subsektor*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            <i class="fa-solid fa-layer-group"></i> SubSektor
        </a>

        <a href="{{ url('admin/slider') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-[#007F8C]
            {{ request()->is('admin/slider*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            <i class="fa-solid fa-images"></i> Slider
        </a>

        <a href="{{ url('admin/kontak') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-[#007F8C]
            {{ request()->is('admin/kontak*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            <i class="fa-solid fa-address-book"></i> Kontak
        </a>

        <a href="{{ url('admin/database') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-[#007F8C]
            {{ request()->is('admin/database*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            <i class="fa-solid fa-database"></i> Database
        </a>

        <a href="{{ url('admin/rekap') }}" class="flex items-center gap-2 py-2 px-3 rounded hover:bg-[#007F8C]
            {{ request()->is('admin/rekap') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            <i class="fa-solid fa-file-lines"></i> Rekap Pendaftaran
        </a>

        <div class="border-t border-teal-600 my-2"></div>

        <form method="POST" action="{{ url('logout') }}">
            @csrf
            <button type="submit" class="flex items-center gap-2 w-full text-left py-2 px-3 rounded hover:bg-red-600">
                <i class="fa-solid fa-right-from-bracket"></i> Logout
            </button>
        </form>
    </nav>
</aside>
