@extends('layouts.app')

@section('title', 'Detail ' . $data['judul'])

@section('content')

{{-- =============================== --}}
{{-- 1. HERO SECTION DENGAN BACKGROUND --}}
{{-- =============================== --}}
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
        <h1 class="text-3xl md:text-5xl font-bold">
            {{ $data['judul'] }}
        </h1>
        <p class="text-xl md:text-2xl font-normal mt-1">
            Data Berdasarkan Jenis Kelamin
        </p>
    </div>
</section>

{{-- =============================== --}}
{{-- 2. BAGIAN 3 LINGKARAN STATISTIK --}}
{{-- =============================== --}}
<main class="container mx-auto px-4 py-12 pt-0">
    <div class="w-full max-w-4xl mx-auto flex justify-around mb-12 -mt-32 md:-mt-25 relative z-20 flex-wrap gap-6">

        {{-- Jumlah --}}
        <div class="text-center">
            <div class="w-40 h-40 md:w-48 md:h-48 flex items-center justify-center bg-[#073B4C] rounded-full shadow-lg">
                <div class="text-white">
                    <p class="text-sm uppercase font-semibold">Jumlah</p>
                    <p class="text-5xl md:text-6xl font-extrabold">{{ $data['jumlah'] }}</p>
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

        {{-- Subsektor Terbanyak --}}
        <div class="text-center">
            <div class="w-40 h-40 md:w-48 md:h-48 flex items-center justify-center bg-[#073B4C] rounded-full shadow-lg">
                <div class="text-white">
                    <p class="text-sm uppercase font-semibold">Subsektor <br> Tertaut</p>
                    <p class="text-2xl md:text-3xl font-extrabold">{{ $data['subsektor_terbanyak'] }}</p>
                </div>
            </div>
        </div>
    </div>

    {{-- =============================== --}}
    {{-- 3. TABEL SUBSEKTOR --}}
    {{-- =============================== --}}
    <div class="w-full max-w-5xl mx-auto bg-[#C2DCE4] rounded-3xl shadow-2xl overflow-hidden border-4 border-[#B1BFC3] mb-12 mt-12">
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                {{-- HEADER --}}
                <thead>
                    <tr class="bg-[#C2DCE4] text-gray-600 uppercase text-bold leading-normal border-b-2 border-gray-400">
                        <th class="py-3 px-6 text-left w-1/12 whitespace-nowrap">No.</th>
                        <th class="py-3 px-6 text-left w-4/12 whitespace-nowrap">Subsektor</th>
                        <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">Jumlah</th>
                        <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">%Pers.</th>
                        <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">Total (Kab)</th>
                        <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">%Kab</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody class="text-[#073B4C] text-sm font-light">
                    @foreach ($data['data_subsektor'] as $i => $s)
                    <tr class="border-b border-gray-500 hover:bg-[#C2DCE4]/80 {{ $i % 2 == 0 ? 'bg-transparent' : 'bg-[#C2DCE4]/70' }}">
                        <td class="py-3 px-6 text-left font-bold">{{ $i + 1 }}.</td>
                        <td class="py-3 px-6 text-left font-bold">{{ $s[0] }}</td>
                        <td class="py-3 px-6 text-center font-bold">{{ $s[1] }}</td>
                        <td class="py-3 px-6 text-center font-bold">{{ $s[2] }}</td>
                        <td class="py-3 px-6 text-center font-bold">{{ $s[3] }}</td>
                        <td class="py-3 px-6 text-center font-bold">{{ $s[4] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
