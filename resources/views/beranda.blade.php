@extends('layouts.app')

@section('title', 'Beranda - Ekonomi Kreatif Sumedang')

@section('content')
<div x-data="{ active: 0 }" class="relative w-full overflow-hidden">
    @foreach ($sliders as $index => $slide)
        <div x-show="active === {{ $index }}"
             x-transition
             class="h-[80vh] bg-cover bg-center flex items-center justify-center text-white text-4xl font-bold"
             style="background-image: url('{{ asset('storage/'.$slide->gambar) }}')">
            <div class="bg-black/50 p-6 rounded-xl text-center">
                <h1 class="text-3xl md:text-5xl font-extrabold">{{ $slide->judul }}</h1>
                <p class="text-lg mt-2">{{ $slide->deskripsi }}</p>
            </div>
        </div>
    @endforeach

    <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex gap-2">
        @foreach ($sliders as $index => $slide)
            <button @click="active = {{ $index }}"
                    class="w-3 h-3 rounded-full"
                    :class="active === {{ $index }} ? 'bg-white' : 'bg-gray-400'"></button>
        @endforeach
    </div>
</div>

<section class="relative bg-white -mt-24 z-10 flex flex-col items-center text-center px-4">
    <h2 class="text-[#073B4C] text-2xl md:text-3xl font-semibold mt-10 mb-8">
        Tentang<br><span class="font-bold">Ekonomi Kreatif</span>
    </h2>

    <div class="relative w-[90%] md:w-[70%] flex flex-col items-center">
        <div class="w-full aspect-video border-2 border-[#073B4C] rounded-3xl overflow-hidden shadow-md z-10">
            <img src="{{ asset('images/sumedang_gate.jpeg') }}" alt="Gerbang Sumedang" class="w-full h-full object-cover">
        </div>
        <div class="absolute -bottom-20 w-[95%] md:w-[110%] bg-white rounded-3xl shadow-2xl text-center p-8 z-20">
            <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-6">
                Ekonomi Kreatif Sumedang merupakan wadah bagi para pelaku usaha dan komunitas kreatif
                untuk mengembangkan ide, inovasi, dan potensi lokal menuju kemandirian ekonomi yang berkelanjutan.
            </p>
            <a href="{{ route('tentang') }}"
               class="bg-[#457B9D] hover:bg-[#356E85] text-white font-medium px-6 py-2 rounded-full transition-all duration-300">
                Lihat Selengkapnya
            </a>
        </div>
    </div>
    <div class="h-40"></div>
</section>

<section class="bg-gray-50 py-16">
    <div class="text-center mb-12">
        <h2 class="text-[#073B4C] text-2xl md:text-3xl font-semibold">
            Artikel<br><span class="font-bold">Ekonomi Kreatif</span>
        </h2>
    </div>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-2 gap-8 px-4">
        @foreach ($artikels as $artikel)
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300">
            <img src="{{ asset('storage/'.$artikel->gambar) }}" alt="{{ $artikel->judul }}" class="w-full h-48 object-cover">
            <div class="p-5 text-left">
                <h3 class="text-[#073B4C] font-bold text-lg mb-2">{{ $artikel->judul }}</h3>
                <p class="text-gray-600 text-sm mb-2 line-clamp-3">{{ Str::limit(strip_tags($artikel->isi), 120) }}</p>
                <span class="text-xs text-gray-500">By {{ $artikel->penulis }} | {{ $artikel->created_at->format('d M Y') }}</span>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-10 text-center">
        <a href="{{ route('petugas.artikel.index') }}"
           class="bg-[#457B9D] hover:bg-[#356E85] text-white font-medium px-8 py-3 rounded-full transition-all duration-300 shadow-md">
            Lihat Semua Artikel
        </a>
    </div>
</section>

<section class="relative py-16 bg-fixed bg-center bg-cover"
    style="background-image: url('{{ asset('images/sumedang_gate.jpeg') }}');">
    <div class="absolute inset-0 bg-white opacity-80 backdrop-blur"></div>

    <div class="relative max-w-7xl mx-auto px-4 z-20 text-[#073B4C]">

        {{-- Kartu Statistik Pelaku Ekraf --}}
        <div class="bg-[#0A4D68] text-white p-6 md:p-10 rounded-[2rem] shadow-2xl mb-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                <div class="flex flex-col items-center justify-center py-4">
                    <i class="fa-solid fa-users text-4xl text-[#FFD166] mb-2"></i>
                    <p class="text-xl font-semibold">Pelaku Ekraf</p>
                    <p class="text-4xl font-bold">{{ $totalPelaku }}</p>
                </div>
                <div class="flex flex-col items-center justify-center py-4 border-t md:border-t-0 md:border-l border-white/30">
                    <i class="fa-solid fa-person text-4xl text-[#FFD166] mb-2"></i>
                    <p class="text-xl font-semibold">Laki-laki</p>
                    <p class="text-4xl font-bold">{{ $pelakuLaki }}</p>
                </div>
                <div class="flex flex-col items-center justify-center py-4 border-t md:border-t-0 md:border-l border-white/30">
                    <i class="fa-solid fa-person-dress text-4xl text-[#FFD166] mb-2"></i>
                    <p class="text-xl font-semibold">Perempuan</p>
                    <p class="text-4xl font-bold">{{ $pelakuPerempuan }}</p>
                </div>
            </div>
        </div>

        {{-- Judul Rentang Usia --}}
        <div class="text-center mb-10">
            <h3 class="text-3xl font-bold uppercase tracking-wider mb-2 text-[#073B4C]">Rentang Usia</h3>
            <p class="text-base text-[#073B4C]">Sebaran pelaku Ekraf berdasarkan usia</p>
        </div>

        {{-- Grid Rentang Usia --}}
        <div class="max-w-3xl mx-auto grid grid-cols-1 sm:grid-cols-3 gap-8">
            @foreach ($usia_data as $data)
            <div class="flex flex-col items-center p-4 bg-white/60 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300">
                <div class="text-lg font-bold text-[#073B4C] mb-2">{{ $data->rentang_usia }}</div>
                <div class="bg-[#7598A3] text-white py-2 px-6 rounded-lg text-lg font-bold shadow-lg w-full text-center">
                    {{ $data->jumlah }} Pelaku
                </div>
            </div>
            @endforeach
        </div>

        {{-- Rata-rata Usia --}}
        <div class="mt-12 flex justify-center">
            <div class="bg-[#B1BFC3] text-[#073B4C] py-3 px-12 rounded-lg shadow-xl text-center">
                <p class="text-lg font-semibold mb-1">Rata-rata Usia</p>
                <p class="text-3xl font-bold text-white">{{ number_format($rataUsia, 1) }} Tahun</p>
            </div>
        </div>

    </div>
</section>

@endsection
