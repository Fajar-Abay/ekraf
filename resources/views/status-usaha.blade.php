@extends('layouts.app')

@section('title', 'Status Usaha - Ekonomi Kreatif Sumedang')

@section('content')

<main class="container mx-auto px-4 py-12">
    
    {{-- JUDUL HALAMAN --}}
    <div class="text-center mb-10">
        <h1 class="text-4xl md:text-5xl font-extrabold text-[#073B4C]">Status Usaha</h1>
        <p class="text-lg text-gray-600 mt-2">Berdasarkan Jenis Badan Usaha</p>
    </div>

    {{-- FILTER --}}
    <div class="w-full max-w-4xl mx-auto flex justify-end mb-10">
    <div class="relative">
        <form method="GET" action="{{ route('status-usaha.index') }}">
            <select name="filter"
                onchange="this.form.submit()"
                class="appearance-none bg-[#E0EFF4] border border-gray-300 text-[#073B4C] py-2 px-6 rounded-full leading-tight focus:outline-none focus:bg-white focus:border-teal-500 shadow-md">
                <option value="default" {{ ($filter ?? 'default') == 'default' ? 'selected' : '' }}>Filter</option>
                <option value="terbanyak" {{ ($filter ?? '') == 'terbanyak' ? 'selected' : '' }}>Terbanyak</option>
                <option value="tersedikit" {{ ($filter ?? '') == 'tersedikit' ? 'selected' : '' }}>Tersedikit</option>
            </select>
        </form>

        {{-- Icon Dropdown Kustom --}}
        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
            </svg>
        </div>
    </div>
</div>


    {{-- WIDGET UTAMA (CARD BESAR) --}}
    <div class="w-full max-w-4xl mx-auto bg-[#C2DCE4] rounded-3xl shadow-2xl overflow-hidden border-4 border-[#B1BFC3]">
        
        {{-- TABEL STATUS USAHA --}}
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto">
                {{-- HEADER --}}
                <thead>
                    <tr class="bg-[#C2DCE4] text-gray-600 uppercase text-bold leading-normal border-b-2 border-gray-400">
                        <th class="py-3 px-6 text-left w-1/12">No.</th>
                        <th class="py-3 px-6 text-left w-7/12">Status Usaha</th>
                        <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">Total (Kab)</th>
                        <th class="py-3 px-6 text-center w-2/12 whitespace-nowrap">%Pers. (Kab)</th>
                    </tr>
                </thead>

                {{-- BODY --}}
                <tbody class="text-[#073B4C] text-sm font-light">
                    @foreach($data as $index => $item)
                    <tr class="border-b border-gray-500 hover:bg-[#C2DCE4]/80 {{ $index % 2 == 0 ? 'bg-transparent' : 'bg-[#C2DCE4]/70' }}">
                        <td class="py-3 px-6 text-left font-bold">{{ $index + 1 }}.</td>
                        <td class="py-3 px-6 text-left font-bold">{{ $item['status'] }}</td>
                        <td class="py-3 px-6 text-center font-bold">{{ $item['total'] }}</td>
                        <td class="py-3 px-6 text-center font-bold">{{ $item['persen'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</main>

@endsection
