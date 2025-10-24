@extends('layouts.app')

@section('title', 'Data Kecamatan - Ekonomi Kreatif Sumedang')

@section('content')

    <main class="container mx-auto px-4 py-12">
        
        {{-- JUDUL HALAMAN --}}
        <div class="text-center mb-4">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-800">Kecamatan</h1>
        </div>

        {{-- FILTER (Diposisikan di Bawah Heading) --}}
        <div class="w-full max-w-4xl mx-auto flex justify-end mb-10">
            <div class="relative">
                <select class="appearance-none bg-[#E0EFF4] border border-gray-300 text-[#073B4C] py-2 px-6 rounded-full leading-tight focus:outline-none focus:bg-white focus:border-teal-500 shadow-md">
                    <option>Filter</option>
                    <option>Terbanyak</option>
                    <option>Tersedikit</option>
                </select>
                {{-- Icon Dropdown Kustom --}}
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                </div>
            </div>
        </div>

        {{-- WIDGET UTAMA (Card Besar) --}}
        <div class="w-full max-w-4xl mx-auto bg-[#C2DCE4] rounded-3xl shadow-2xl overflow-hidden p-0 border-4 border-[#B1BFC3]">
            
            {{-- TABEL DATA KECAMATAN --}}
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto">
                    {{-- Bagian Head Tabel --}}
                    <thead>
                        <tr class="bg-[#C2DCE4] text-gray-600 uppercase text-bold leading-normal border-b-2 border-gray-400">
                            <th class="py-3 px-6 text-left w-1/12">No.</th>
                            <th class="py-3 px-6 text-left w-5/12">KECAMATAN</th>
                            <th class="py-3 px-6 text-center w-3/12">TOTAL(KAB)</th>
                            <th class="py-3 px-6 text-center w-3/12">%PERS.(KAB)</th>
                        </tr>
                    </thead>
                    
                    {{-- Bagian Body Tabel --}}
                    <tbody class="text-[#073B4C] text-sm font-light">
                        {{-- Data berasal dari Controller --}}
                        @foreach($data_kecamatan as $index => $item)
                        <tr class="border-b border-gray-500 hover:bg-[#C2DCE4]/80 {{ $index % 2 == 0 ? 'bg-transparent' : 'bg-[#C2DCE4]/70' }}">
                            
                            {{-- Nomor Urut (Menggunakan $start_index dari Controller untuk paginasi) --}}
                            <td class="py-3 px-6 text-left whitespace-nowrap font-bold text-[#073B4C]">
                                {{ $start_index + $index + 1 }}.
                            </td>
                            
                            {{-- Nama Kecamatan (Link ke Halaman Detail) --}}
                            <td class="py-3 px-6 text-left font-bold">
                                <a href="{{ route('kecamatan.show', ['slug' => Str::slug($item[0])]) }}" class="text-[#073B4C] hover:text-teal-700 transition duration-150">
                                    {{ $item[0] }}
                                </a>
                            </td>
                            
                            {{-- Total --}}
                            <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                                {{ $item[1] }}
                            </td>
                            {{-- Persentase --}}
                            <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                                {{ $item[2] }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- PAGINATION --}}
            <div class="flex justify-center items-center py-6 space-x-2">
                
                {{-- Tombol Prev --}}
                <a href="?page={{ max(1, $current_page - 1) }}" class="h-10 w-10 flex items-center justify-center text-gray-500 hover:text-gray-800 transition duration-150">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
                </a>
                
                {{-- Halaman 1 --}}
                <a href="?page=1" class="h-10 w-10 flex items-center justify-center font-bold rounded-full shadow-lg {{ $current_page == 1 ? 'text-white bg-teal-600' : 'text-gray-600 bg-gray-100 hover:bg-gray-200 transition duration-150' }}">
                    1
                </a>
                
                {{-- Halaman 2 --}}
                <a href="?page=2" class="h-10 w-10 flex items-center justify-center font-bold rounded-full shadow-lg {{ $current_page == 2 ? 'text-white bg-teal-600' : 'text-gray-600 bg-gray-100 hover:bg-gray-200 transition duration-150' }}">
                    2
                </a>
                
                {{-- Tombol Next --}}
                <a href="?page={{ min(2, $current_page + 1) }}" class="h-10 w-10 flex items-center justify-center text-gray-500 hover:text-gray-800 transition duration-150">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>

        </div>
    </main>

@endsection