@extends('layouts.app')

@section('title', 'Data Rentang Usia - Ekonomi Kreatif Sumedang')

@section('content')
{{-- Import Str untuk slugify di view --}}
@php
    use Illuminate\Support\Str;

    // Helper untuk menangani slug dengan karakter khusus (<, >)
    function generateUsiaSlug($usia) {
        // Menggunakan slug yang sudah didefinisikan di controller:
        if ($usia == '<20 Tahun') {
            return 'kurang-20-tahun';
        } elseif ($usia == '>60 Tahun') {
            return 'lebih-60-tahun';
        }
        return Str::slug($usia);
    }
@endphp

<main class="container mx-auto px-4 py-12">
    {{-- JUDUL HALAMAN --}}
    <h1 class="text-4xl font-extrabold text-center mb-10 text-gray-800">
        Rentang Usia
    </h1>
    
    {{-- Filter Placeholder --}}
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

    {{-- KARTU UTAMA TABEL --}}
    <div class="w-full max-w-4xl mx-auto bg-[#C2DCE4] rounded-3xl shadow-2xl overflow-hidden p-0 border-4 border-[#B1BFC3] mb-12">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                {{-- HEAD TABEL --}}
                <thead>
                    <tr class="bg-[#C2DCE4] text-gray-600 uppercase text-bold leading-normal border-b-2 border-gray-400">
                        <th class="py-3 px-6 text-left w-1/12 whitespace-nowrap"></th> {{-- Kolom No. --}}
                        <th class="py-3 px-6 text-left w-5/12 whitespace-nowrap">RENTANG USIA</th>
                        <th class="py-3 px-6 text-center w-3/12 whitespace-nowrap">TOTAL (KAB)</th>
                        <th class="py-3 px-6 text-center w-3/12 whitespace-nowrap">%PERS. (KAB)</th>
                    </tr>
                </thead>
                
                {{-- BODY TABEL --}}
                <tbody class="text-[#073B4C] text-lg font-light">
                    @foreach($data_usia as $index => $data)
                    <tr class="border-b border-gray-500 hover:bg-[#C2DCE4]/80 {{ $index % 2 == 0 ? 'bg-transparent' : 'bg-[#C2DCE4]/70' }}">
                        
                        {{-- Nomor Urut --}}
                        <td class="py-3 px-6 text-left whitespace-nowrap font-bold text-[#073B4C]">
                            {{ $start_index + $index + 1 }}.
                        </td>
                        
                        {{-- Rentang Usia (DIJADIKAN LINK TANPA GARIS BAWAH) --}}
                        <td class="py-3 px-6 text-left font-bold text-[#073B4C] whitespace-nowrap">
                            {{-- Kelas 'underline' dan 'hover:underline' telah dihapus --}}
                            <a href="{{ route('rentangusia.show', generateUsiaSlug($data[0])) }}" class="hover:text-teal-700 transition duration-150">
                                {{ $data[0] }}
                            </a>
                        </td>
                        
                        {{-- Total (KAB) --}}
                        <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                            {{ number_format($data[1], 0, ',', '.') }}
                        </td>
                        
                        {{-- %Pers. (KAB) --}}
                        <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                            {{ number_format($data[2], 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection