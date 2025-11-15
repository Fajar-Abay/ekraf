@extends('layouts.admin')

@section('main')
<div class="px-4 sm:px-6 py-8 sm:py-10 bg-gray-50 min-h-screen">
    <div class="max-w-7xl mx-auto">

        <!-- Header -->
        <div class="mb-8 text-center sm:text-left">
            <h1 class="text-2xl sm:text-3xl font-bold text-[#004b5c] mb-2">Dashboard Admin</h1>
            <p class="text-gray-600 text-sm sm:text-base">
                Selamat datang kembali, <span class="font-semibold">{{ Auth::user()->name }}</span> 👋
            </p>
        </div>

        <!-- Statistik Cards (Shortcut Section) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-5 sm:gap-6">

            <!-- Total User -->
            <a href="{{ route('admin.users.index') }}"
               class="bg-white rounded-xl shadow-md hover:shadow-xl p-5 sm:p-6 transition-all duration-300 border-t-4 border-[#118AB2] hover:-translate-y-1 block">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-gray-500 text-xs sm:text-sm uppercase tracking-wide">Total User</h3>
                        <p class="text-2xl sm:text-3xl font-bold text-[#004b5c]">{{ $totalUser }}</p>
                    </div>
                    <div class="bg-[#118AB2]/10 text-[#118AB2] p-3 sm:p-4 rounded-full">
                        <i class="fa-solid fa-users text-lg sm:text-xl"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500">Lihat dan kelola semua pengguna sistem.</p>
            </a>

            <!-- Total Usaha -->
            <a href="{{ route('admin.rekap') }}"
               class="bg-white rounded-xl shadow-md hover:shadow-xl p-5 sm:p-6 transition-all duration-300 border-t-4 border-[#06D6A0] hover:-translate-y-1 block">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-gray-500 text-xs sm:text-sm uppercase tracking-wide">Total Usaha</h3>
                        <p class="text-2xl sm:text-3xl font-bold text-[#004b5c]">{{ $totalUsaha }}</p>
                    </div>
                    <div class="bg-[#06D6A0]/10 text-[#06D6A0] p-3 sm:p-4 rounded-full">
                        <i class="fa-solid fa-store text-lg sm:text-xl"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500">Rekap dan pantau data usaha di Sumedang.</p>
            </a>

            <!-- Total Artikel -->
            <a href="{{ route('admin.artikel.index') }}"
               class="bg-white rounded-xl shadow-md hover:shadow-xl p-5 sm:p-6 transition-all duration-300 border-t-4 border-[#EF476F] hover:-translate-y-1 block">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-gray-500 text-xs sm:text-sm uppercase tracking-wide">Total Artikel</h3>
                        <p class="text-2xl sm:text-3xl font-bold text-[#004b5c]">{{ $totalArtikel }}</p>
                    </div>
                    <div class="bg-[#EF476F]/10 text-[#EF476F] p-3 sm:p-4 rounded-full">
                        <i class="fa-solid fa-newspaper text-lg sm:text-xl"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500">Kelola artikel dan berita ekonomi kreatif.</p>
            </a>

            <!-- Total Subsektor -->
            <a href="{{ route('admin.subsektor.index') }}"
               class="bg-white rounded-xl shadow-md hover:shadow-xl p-5 sm:p-6 transition-all duration-300 border-t-4 border-[#FFD166] hover:-translate-y-1 block">
                <div class="flex items-center justify-between mb-3">
                    <div>
                        <h3 class="text-gray-500 text-xs sm:text-sm uppercase tracking-wide">Total Subsektor</h3>
                        <p class="text-2xl sm:text-3xl font-bold text-[#004b5c]">{{ $totalSubsekror }}</p>
                    </div>
                    <div class="bg-[#FFD166]/10 text-[#FFD166] p-3 sm:p-4 rounded-full">
                        <i class="fa-solid fa-layer-group text-lg sm:text-xl"></i>
                    </div>
                </div>
                <p class="text-xs text-gray-500">Lihat kategori subsektor yang terdaftar.</p>
            </a>
        </div>

        <!-- Quick Shortcut Buttons -->
        <div class="mt-12 bg-white rounded-2xl shadow-md p-6 sm:p-8">
            <h2 class="text-lg sm:text-xl font-bold text-[#004b5c] mb-4">📂 Akses Cepat</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-3 sm:gap-4">
                <a href="{{ route('admin.users.index') }}" class="flex items-center justify-center gap-2 px-4 py-3 bg-[#118AB2] text-white rounded-lg hover:bg-[#0F7A9D] transition text-sm font-medium">
                    <i class="fa-solid fa-user-gear"></i> <span>Kelola User</span>
                </a>
                <a href="{{ route('admin.artikel.index') }}" class="flex items-center justify-center gap-2 px-4 py-3 bg-[#EF476F] text-white rounded-lg hover:bg-[#D83B60] transition text-sm font-medium">
                    <i class="fa-solid fa-newspaper"></i> <span>Artikel</span>
                </a>
                <a href="{{ route('admin.subsektor.index') }}" class="flex items-center justify-center gap-2 px-4 py-3 bg-[#FFD166] text-[#004b5c] rounded-lg hover:bg-[#F6C946] transition text-sm font-medium">
                    <i class="fa-solid fa-layer-group"></i> <span>Subsektor</span>
                </a>
                <a href="{{ route('admin.rekap') }}" class="flex items-center justify-center gap-2 px-4 py-3 bg-[#06D6A0] text-white rounded-lg hover:bg-[#05B78B] transition text-sm font-medium">
                    <i class="fa-solid fa-store"></i> <span>Rekap Usaha</span>
                </a>
                <a href="{{ route('admin.database') }}" class="flex items-center justify-center gap-2 px-4 py-3 bg-[#073B4C] text-white rounded-lg hover:bg-[#062E3C] transition text-sm font-medium">
                    <i class="fa-solid fa-map-location-dot"></i> <span>Database Peta</span>
                </a>
            </div>
        </div>

    </div>
</div>
@endsection
