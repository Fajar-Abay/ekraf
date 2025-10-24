@extends('layouts.app')

@section('title', 'Beranda - Ekonomi Kreatif Sumedang')

@section('content')

    <section style="
        background: url('{{ asset('images/sumedang_gate.jpeg') }}') center/cover no-repeat;
        height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #073B4C;
        text-shadow: 1px 1px 5px rgba(255,255,255,0.6);
        font-size: 2.5rem;
        font-weight: 700;
        position: relative;
    ">
        <div class="absolute inset-0 bg-white/50"></div>
        <div class="relative z-10 p-4">
            <h1 class="text-4xl md:text-5xl font-extrabold text-center leading-tight">
                Database <br> Ekonomi Kreatif <br> Sumedang
            </h1>
        </div>
    </section>

    <main class="container mx-auto px-4 py-12">
        <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Data Wilayah dan Potensi Kreatif</h2>
        
        <div class="flex flex-col items-center">

            <div class="w-full max-w-lg mb-8">
                <div id="sumedang-map-container" class="w-full rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                    <div class="w-full h-80 bg-gray-100 flex items-center justify-center text-gray-500 font-bold border-b-4 border-teal-600 text-center p-4">
                        [Placeholder: Peta Interaktif Kabupaten Sumedang]
                        <br>
                        Klik salah satu wilayah untuk memuat data kecamatan.
                    </div>
                </div>
            </div>
            
            {{-- TOMBOL FILTER UTAMA (Kecamatan) --}}
            <a href="{{ route('kecamatan.index') }}" 
                class="w-full max-w-lg bg-[#B1BFC3] hover:bg-gray-400 text-gray-800 py-3 px-6 rounded-full text-lg font-semibold mb-6 shadow-xl hover:shadow-2xl transition duration-300 flex items-center">
                
                {{-- ICON ALAMAT (Font Awesome) --}}
                <i class="fa-solid fa-location-dot h-6 w-6 mr-3 text-gray-900"></i>
                
                Kecamatan
            </a>

            {{-- Card Data Kecamatan (Data Kosong) --}}
            <div class="w-full max-w-lg bg-white rounded-2xl shadow-2xl overflow-hidden p-6 border border-gray-100 mb-8">
                <div class="mb-6">
                    {{-- Peta Kecamatan (Placeholder Kosong) --}}
                    <div class="w-full h-48 bg-gray-200 rounded-xl flex items-center justify-center text-gray-500 font-semibold border border-gray-300">
                        [Placeholder Peta Kecamatan]
                    </div>
                </div>

                <div class="text-center mb-4">
                    <h3 class="text-3xl font-extrabold text-[#062B37]">Nama Kecamatan</h3>
                </div>

                {{-- Detail Statistik (Data Kosong) --}}
                <div class="space-y-3 text-lg">
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">• Jumlah Desa:</span>
                        <span class="font-bold text-teal-900">-</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">• Luas Wilayah:</span>
                        <span class="font-bold text-teal-900">- KM2</span>
                    </div>
                    <div class="flex justify-between border-b pb-2">
                        <span class="font-medium text-gray-600">• Jumlah Penduduk:</span>
                        <span class="font-bold text-teal-900">- orang</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium text-gray-600">• Kepadatan Penduduk:</span>
                        <span class="font-bold text-teal-900">- orang/ KM2</span>
                    </div>
                </div>

                <p class="text-xs text-gray-400 mt-4 text-center">
                    Sumber: [Placeholder Sumber Data]
                </p>

                {{-- Tombol Detail - Shadow-xl --}}
                <div class="mt-6 text-center">
                    <a href="#" class="inline-block bg-[#073B4C] hover:bg-teal-800 text-white font-bold py-3 px-10 rounded-full transition duration-300 shadow-xl hover:shadow-2xl">
                        Lihat Detail
                    </a>
                </div>
            </div>
            
            {{-- Bagian Tombol Filter/Kategori Tambahan --}}
            <div class="w-full max-w-lg mt-4 space-y-3">
                @php
                    $filters = [
                        'Desa' => 'desa', 
                        'Subsektor' => '#', 
                        'Rentang Usia' => 'rentangusia.index', 
                        'Jenis Kelamin' => 'jenis-kelamin', 
                        'Status Usaha' => 'status-usaha.index',
                    ];
                @endphp
                
                @foreach($filters as $filter_name => $route_name)
                <a href="{{ $route_name != '#' ? route($route_name) : '#' }}" 
                    class="w-full bg-[#B1BFC3] hover:bg-gray-400 text-gray-800 py-3 px-6 rounded-full text-lg font-semibold transition duration-200 shadow-lg hover:shadow-xl flex items-center">
                    
                    {{-- ICON ALAMAT (Font Awesome) --}}
                    <i class="fa-solid fa-location-dot h-5 w-5 mr-3 text-gray-900"></i>
                    
                    {{ $filter_name }}
                </a>
                @endforeach
            </div>

        </div>
    </main>

@endsection