@extends('layouts.app')

@section('title', 'Detail ' . $data['nama'])

@section('content')

{{-- <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"> --}}

    {{-- 1. HERO SECTION DENGAN GAMBAR LATAR BELAKANG --}}
    <section style="
        background: url('{{ asset('images/sumedang_gate.jpeg') }}') center/cover no-repeat;
        /* Tinggi dikurangi sedikit agar overlap lebih pas di tengah */
        height: 60vh; 
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
        <div class="relative z-10 text-center">
            {{-- Nama Kecamatan tetap bold dan besar --}}
            <h1 class="text-3xl md:text-5xl font-bold">
                {{ $data['nama'] }} 
            </h1>
            {{-- TEKS DI SINI DIHILANGKAN BOLD-nya --}}
            <p class="text-xl md:text-2xl font-normal mt-1">
                 Kecamatan di Sumedang
            </p>
        </div>
    </section>

    <main class="container mx-auto px-4 py-12 pt-0">
        
        {{-- 2. WIDGET 3 LINGKARAN (Overlap Section) --}}
        {{-- Menggunakan -mt-[X] untuk menggeser ke atas (overlap) dan disesuaikan agar di tengah --}}
        <div class="w-full max-w-4xl mx-auto flex justify-around mb-12 -mt-32 md:-mt-25 relative z-20"> 
            
            {{-- Jumlah Pelaku --}}
            <div class="text-center">
                <div class="w-40 h-40 md:w-48 md:h-48 flex items-center justify-center bg-[#073B4C] rounded-full shadow-lg">
                    <div class="text-white">
                        <p class="text-sm uppercase font-semibold">Jumlah Pelaku</p>
                        <p class="text-5xl md:text-6xl font-extrabold">{{ $data['pelaku'] }}</p>
                    </div>
                </div>
            </div>
            
            {{-- Persentase --}}
            <div class="text-center">
                <div class="w-40 h-40 md:w-48 md:h-48 flex items-center justify-center bg-[#073B4C] rounded-full shadow-lg">
                    <div class="text-white">
                        <p class="text-sm uppercase font-semibold">Persentase</p>
                        <p class="text-5xl md:text-6xl font-extrabold">{{ $data['persentase'] }}</p>
                    </div>
                </div>
            </div>

            {{-- Subsektor Tertaut --}}
            <div class="text-center">
                <div class="w-40 h-40 md:w-48 md:h-48 flex items-center justify-center bg-[#073B4C] rounded-full shadow-lg">
                    <div class="text-white">
                        <p class="text-sm uppercase font-semibold">Subsektor Tertaut</p>
                        <p class="text-5xl md:text-6xl font-extrabold">{{ count($data['subsektor']) }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- WIDGET UTAMA (Card Tabel Subsektor) --}}
        {{-- Data dijamin sinkron dengan Controller yang sudah diubah --}}
        <div class="w-full max-w-4xl mx-auto bg-[#C2DCE4] rounded-3xl shadow-2xl overflow-hidden p-0 border-4 border-[#B1BFC3] mb-8 mt-12">
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    {{-- Bagian Head Tabel Subsektor (Diperbaiki agar sebaris dan center) --}}
                    <thead>
                        <tr class="bg-[#C2DCE4] text-gray-600 uppercase text-bold leading-normal border-b-2 border-gray-400">
                            {{-- Gunakan whitespace-nowrap agar teks tidak terpotong --}}
                            <th class="py-3 px-6 text-left w-1/12 whitespace-nowrap">No.</th>
                            <th class="py-3 px-6 text-left w-4/12 whitespace-nowrap">Subsektor</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">Jumlah</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">%Pers.</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">TOTAL(KAB)</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">%PERS.(KAB)</th>
                        </tr>
                    </thead>
                    
                    {{-- Bagian Body Tabel Subsektor --}}
                    <tbody class="text-[#073B4C] text-sm font-light">
                        @foreach($data['subsektor'] as $index => $sub)
                        <tr class="border-b border-gray-500 hover:bg-[#C2DCE4]/80 {{ $index % 2 == 0 ? 'bg-transparent' : 'bg-[#C2DCE4]/70' }}">
                            
                            {{-- Perataan disesuaikan dengan header --}}
                            <td class="py-3 px-6 text-left whitespace-nowrap font-bold text-[#073B4C]">
                                {{ $index + 1 }}.
                            </td>
                            <td class="py-3 px-6 text-left font-bold text-[#073B4C] whitespace-nowrap">
                                {{ $sub['nama'] }}
                            </td>
                            <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                                {{ $sub['jumlah'] }}
                            </td>
                            <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                                {{ $sub['persen'] }}
                            </td>
                            <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                                {{ $sub['total_kab'] }}
                            </td>
                            <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                                {{ $sub['persen_kab'] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- WIDGET CARD INFORMASI TAMBAHAN --}}
        <div class="w-full max-w-4xl mx-auto flex flex-col items-center">
        

@endsection