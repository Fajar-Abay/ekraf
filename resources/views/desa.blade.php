@extends('layouts.app')

@section('title', '20 Desa Terbanyak - Ekonomi Kreatif Sumedang')

@section('content')

    <main class="container mx-auto px-4 py-12">
        
        {{-- JUDUL HALAMAN --}}
        <div class="text-center mb-10">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">20 Desa Terbanyak</h1>
            <p class="text-lg text-gray-600 mt-2">Berdasarkan Jumlah Pelaku Ekonomi Kreatif</p>
        </div>

        {{-- WIDGET UTAMA (Card Besar) --}}
        <div class="w-full max-w-4xl mx-auto bg-[#C2DCE4] rounded-3xl shadow-2xl overflow-hidden p-0 border-4 border-[#B1BFC3]">
            
            {{-- TABEL DATA DESA --}}
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    {{-- Bagian Head Tabel --}}
                    <thead>
                        <tr class="bg-[#C2DCE4] text-gray-600 uppercase text-bold leading-normal border-b-2 border-gray-400">
                            <th class="py-3 px-6 text-left w-1/12">No.</th>
                            <th class="py-3 px-6 text-left w-3/12">DESA</th>
                            <th class="py-3 px-6 text-left w-4/12">KECAMATAN</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">TOTAL(KAB)</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">%PERS.(KAB)</th>
                        </tr>
                    </thead>
                    
                    {{-- Bagian Body Tabel --}}
                    <tbody class="text-[#073B4C] text-sm font-light">
                        @foreach($data_desa as $index => $item)
                        <tr class="border-b border-gray-500 hover:bg-[#C2DCE4]/80 {{ $index % 2 == 0 ? 'bg-transparent' : 'bg-[#C2DCE4]/70' }}">
                            
                            {{-- Nomor Urut --}}
                            <td class="py-3 px-6 text-left whitespace-nowrap font-bold text-[#073B4C]">
                                {{ $start_index + $index + 1 }}.
                            </td>
                            
                            {{-- Nama Desa --}}
                            <td class="py-3 px-6 text-left font-bold text-[#073B4C]">
                                {{ $item[0] }}
                            </td>

                            {{-- Nama Kecamatan (Perubahan: Ditambahkan class font-bold dan text-[#073B4C]) --}}
                            <td class="py-3 px-6 text-left font-bold text-[#073B4C]">
                                {{ $item[1] }}
                            </td>
                            
                            {{-- Total --}}
                            <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                                {{ $item[2] }}
                            </td>

                            {{-- Persentase --}}
                            <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                                {{ $item[3] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </main>

@endsection