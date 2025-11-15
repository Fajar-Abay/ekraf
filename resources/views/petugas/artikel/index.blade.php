@extends('layouts.petugas')

@section('title', 'Artikel Ekonomi Kreatif')

@section('content')
    <!-- Header Gambar -->
    <div class="relative w-full h-64 md:h-80 rounded-2xl overflow-hidden mb-8 shadow-md">
        <img src="{{ asset('image/bg.jpg') }}" class="w-full h-full object-cover" alt="Sumedang">
        <div class="absolute inset-0 bg-white/30 backdrop-blur-[1px]"></div>
        <h2 class="absolute inset-0 flex items-center justify-center text-3xl md:text-4xl font-bold text-[#073b4c] drop-shadow-lg">
            Artikel Ekonomi Kreatif
        </h2>
    </div>

    <!-- Pencarian & Tambah -->
    <div class="flex flex-wrap justify-center gap-4 mb-10">
        <form action="{{ route('petugas.artikel.index') }}" method="GET" class="relative w-full sm:w-1/2 lg:w-1/3">
            <i class="fa-solid fa-magnifying-glass absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
            <input type="text" name="search" value="{{ request('search') }}"
                   placeholder="Cari Artikel..."
                   class="w-full pl-10 pr-4 py-3 rounded-full shadow-md focus:ring-2 focus:ring-[#004E64]/50 focus:outline-none">
        </form>

        <a href="{{ route('petugas.artikel.create') }}"
           class="bg-[#004E64] hover:bg-[#007F8C] text-white px-5 py-3 rounded-full shadow-md flex items-center gap-2 transition-all duration-300">
           <i class="fa-solid fa-plus"></i> Tambah Artikel
        </a>
    </div>

    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($artikels as $artikel)
            <a href="{{ route('petugas.artikel.show', $artikel->id) }}"
               class="bg-white rounded-2xl overflow-hidden shadow hover:-translate-y-2 transition-transform duration-300">
                <img src="{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : asset('images/bg.jpg') }}"
                     class="w-full h-48 object-cover" alt="{{ $artikel->judul }}">
                <div class="p-4">
                    <h3 class="font-bold text-lg text-[#003846] mb-2">{{ $artikel->judul }}</h3>
                    <p class="text-gray-600 text-sm">{{ \Illuminate\Support\Str::limit(strip_tags($artikel->isi), 120) }}</p>
                </div>
                <div class="border-t px-4 py-2 text-sm text-gray-500 flex justify-between">
                    <span><i class="fa-regular fa-calendar"></i> {{ $artikel->created_at->translatedFormat('d M Y') }}</span>
                    <span><i class="fa-regular fa-user"></i> {{ $artikel->penulis }}</span>
                </div>
            </a>
        @empty
            <p class="text-center text-gray-500 col-span-full">Belum ada artikel tersedia.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $artikels->links('pagination::tailwind') }}
    </div>
@endsection
