<!-- resources/views/components/sidebar.blade.php -->
<aside class="bg-[#004E64] text-white w-64 min-h-screen flex flex-col">
    <!-- Logo dan Judul -->
    <div class="flex items-center justify-center py-6 border-b border-teal-600">
        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-10 h-10 mr-2">
        <div class="text-sm font-semibold leading-tight">
            EKONOMI KREATIF<br>SUMEDANG
        </div>
    </div>

    <!-- Navigasi Utama -->
    <nav class="flex-1 px-4 py-4 space-y-1">
        <a href="{{ route('admin.dashboard') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/beranda') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            Beranda
        </a>
        <a href="{{ url('admin/tentang') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/tentang') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            Tentang
        </a>
        <a href="{{ url('admin/artikel') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/artikel*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            Artikel
        </a>
        <a href="{{ url('admin/subsektor') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/subsektor*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            SubSektor
        </a>
        <a href="{{ url('admin/slider') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/slider*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            Slider
        </a>
        <a href="{{ url('admin/kontak') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/kontak*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            Kontak
        </a>
        <a href="{{ url('admin/pendataan') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/pendataan*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            Pendataan
        </a>
         <!-- Garis Pemisah -->
         <div class="border-t border-teal-600"></div>

          <a href="{{ url('admin/database') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/database*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            Database
        </a>
        <a href="{{ url('admin/pendaftaran') }}" class="block py-2 px-3 rounded hover:bg-[#007F8C] {{ request()->is('admin/pendaftaran*') ? 'bg-[#007F8C] font-semibold border-l-4 border-white' : '' }}">
            Pendaftaran
        </a>
        <form method="POST" action="{{ url('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left py-2 px-3 rounded hover:bg-red-600">
                Logout
            </button>
        </form>
    </nav>
</aside>
