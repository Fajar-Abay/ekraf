@extends('layouts.app')

@section('title', $data['nama'] . ' - Rentang Usia Ekraf Sumedang')

@section('content')

    {{-- HERO SECTION --}}
    <section style="
        background: url('{{ asset('images/sumedang_gate.jpeg') }}') center/cover no-repeat;
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
            <h1 class="text-3xl md:text-5xl font-bold">{{ $data['nama'] }}</h1>
            <p class="text-xl md:text-2xl font-normal mt-1">Rentang Usia Pelaku Ekonomi Kreatif</p>
        </div>
    </section>

    <main class="container mx-auto px-4 py-12 pt-0">

        {{-- 3 LINGKARAN UTAMA --}}
        <div class="w-full max-w-4xl mx-auto flex flex-wrap justify-around mb-12 -mt-32 md:-mt-28 relative z-20">
            
            {{-- Jumlah Pelaku --}}
            <div class="text-center mb-6 md:mb-0">
                <div class="w-40 h-40 md:w-48 md:h-48 flex items-center justify-center bg-[#073B4C] rounded-full shadow-lg">
                    <div class="text-white">
                        <p class="text-sm uppercase font-semibold">Jumlah Pelaku</p>
                        <p class="text-5xl md:text-6xl font-extrabold">{{ number_format($data['pelaku'], 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            {{-- Persentase --}}
            <div class="text-center mb-6 md:mb-0">
                <div class="w-40 h-40 md:w-48 md:h-48 flex items-center justify-center bg-[#073B4C] rounded-full shadow-lg">
                    <div class="text-white">
                        <p class="text-sm uppercase font-semibold">Persentase</p>
                        <p class="text-5xl md:text-6xl font-extrabold">{{ number_format($data['persentase'], 2) }}</p>
                    </div>
                </div>
            </div>

            {{-- Subsektor Tertaut --}}
            <div class="text-center">
                <div class="w-40 h-40 md:w-48 md:h-48 flex items-center justify-center bg-[#073B4C] rounded-full shadow-lg">
                    <div class="text-white">
                        <p class="text-sm uppercase font-semibold">Subsektor Tertaut</p>
                        <p class="text-5xl md:text-6xl font-extrabold">{{ $data['subsektor_tertaut'] }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- TABEL DETAIL SUBSEKTOR --}}
        <div class="w-full max-w-5xl mx-auto bg-[#C2DCE4] rounded-3xl shadow-2xl overflow-hidden p-0 border-4 border-[#B1BFC3] mb-8 mt-12">
            <h3 class="text-2xl font-bold text-center text-gray-800 pt-6">Detail Subsektor</h3>
            <div class="overflow-x-auto p-6">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-[#C2DCE4] text-gray-600 uppercase text-bold leading-normal border-b-2 border-gray-400">
                            <th class="py-3 px-6 text-left w-1/12 whitespace-nowrap">No.</th>
                            <th class="py-3 px-6 text-left w-3/12 whitespace-nowrap">Subsektor</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">Jumlah</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">%Pers.</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">Total (Kab)</th>
                            <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">%Pers. (Kab)</th>
                        </tr>
                    </thead>
                    <tbody class="text-[#073B4C] text-sm font-light">
                        @foreach($data['subsektor'] as $index => $item)
                        <tr class="border-b border-gray-500 hover:bg-[#C2DCE4]/80 {{ $index % 2 == 0 ? 'bg-transparent' : 'bg-[#C2DCE4]/70' }}">
                            <td class="py-3 px-6 text-left font-bold">{{ $index + 1 }}.</td>
                            <td class="py-3 px-6 text-left whitespace-nowrap font-semibold">{{ $item['nama'] }}</td>
                            <td class="py-3 px-6 text-center font-bold">{{ number_format($item['jumlah'], 0, ',', '.') }}</td>
                            <td class="py-3 px-6 text-center font-bold">{{ number_format($item['persen'], 2) }}</td>
                            <td class="py-3 px-6 text-center font-bold">{{ number_format($item['total_kab'], 0, ',', '.') }}</td>
                            <td class="py-3 px-6 text-center font-bold">{{ number_format($item['persen_kab'], 2) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </main>

@endsection
