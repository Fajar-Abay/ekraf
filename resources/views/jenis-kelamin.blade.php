@extends('layouts.app')

@section('title', 'Data Jenis Kelamin - Ekonomi Kreatif Sumedang')

@section('content')
<main class="container mx-auto px-4 py-12">
    {{-- JUDUL HALAMAN --}}
    <h1 class="text-4xl font-extrabold text-center mb-10 text-gray-800">
        Jenis Kelamin
    </h1>

    {{-- FILTER DROPDOWN --}}
    <div class="w-full max-w-4xl mx-auto flex justify-end mb-10">
        <div class="relative">
            <select class="appearance-none bg-[#E0EFF4] border border-gray-300 text-[#073B4C] py-2 px-6 rounded-full leading-tight focus:outline-none focus:bg-white focus:border-teal-500 shadow-md">
                <option>Filter</option>
                <option>Terbanyak</option>
                <option>Tersedikit</option>
            </select>
            {{-- ICON DROPDOWN --}}
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
                </svg>
            </div>
        </div>
    </div>

    {{-- KARTU UTAMA TABEL --}}
    <div class="w-full max-w-4xl mx-auto bg-[#C2DCE4] rounded-3xl shadow-2xl overflow-hidden border-4 border-[#B1BFC3] mb-12">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                {{-- HEAD TABEL --}}
                <thead>
                    <tr class="bg-[#C2DCE4] text-gray-600 uppercase text-bold leading-normal border-b-2 border-gray-400">
                        <th class="py-3 px-6 text-left w-1/12 whitespace-nowrap"></th> {{-- Kolom No --}}
                        <th class="py-3 px-6 text-left w-5/12 whitespace-nowrap">JENIS KELAMIN</th>
                        <th class="py-3 px-6 text-center w-3/12 whitespace-nowrap">TOTAL (KAB)</th>
                        <th class="py-3 px-6 text-center w-3/12 whitespace-nowrap">%PERS. (KAB)</th>
                    </tr>
                </thead>

                {{-- BODY TABEL --}}
                <tbody class="text-[#073B4C] text-lg font-light">
                    @foreach ($data as $index => $item)
                    <tr class="border-b border-gray-500 hover:bg-[#C2DCE4]/80 {{ $index % 2 == 0 ? 'bg-transparent' : 'bg-[#C2DCE4]/70' }}">
                        {{-- Nomor Urut --}}
                        <td class="py-3 px-6 text-left font-bold text-[#073B4C]">
                            {{ $index + 1 }}.
                        </td>

                        {{-- Jenis Kelamin --}}
                        <td class="py-3 px-6 text-left font-bold text-[#073B4C] whitespace-nowrap">
                            <a href="{{ route('detail_kelamin', strtolower($item['nama'])) }}" class="hover:text-teal-700 transition duration-150">
                                {{ $item['nama'] }}
                            </a>
                        </td>

                        {{-- Total (KAB) --}}
                        <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                            {{ number_format($item['jumlah'], 0, ',', '.') }}
                        </td>

                        {{-- %Persentase --}}
                        <td class="py-3 px-6 text-center font-bold text-[#073B4C]">
                            {{ number_format($item['persentase'], 2) }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
