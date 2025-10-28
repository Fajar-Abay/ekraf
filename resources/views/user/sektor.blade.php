@extends('layouts.app')

@section('title', 'Sektor - Ekonomi Kreatif Sumedang')

@section('content')

<!-- HERO SECTION -->
<section
    class="relative flex items-center justify-center text-center text-white min-h-[80vh]"
    style="background: url('{{ asset('images/sumedang_gate.jpeg') }}') center center / cover no-repeat;"
>
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10 animate-fade-up">
        <h2 class="text-3xl md:text-5xl font-bold mb-3 drop-shadow-lg">
            Subsektor
        </h2>
        <p class="text-xl md:text-2xl font-semibold drop-shadow-lg">
            Ekonomi Kreatif Kabupaten Sumedang
        </p>
    </div>
</section>

<!-- GRID SUBSEKTOR -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12 animate-fade-up">
            <h2 class="text-[#073B4C] text-2xl md:text-3xl font-semibold">
                Jelajahi Berbagai<br><span class="font-bold">Subsektor Ekonomi Kreatif</span>
            </h2>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-12 justify-center">
            @foreach ($subsektor as $index => $item)
                <a href="{{ url('sektor/detail/' . Str::slug($item->nama)) }}"
                class="relative flex items-center justify-center w-48 h-48 mx-auto rounded-full 
                        bg-[#F9FAFB] border-4 border-[#073B4C] shadow-md overflow-hidden
                        hover:bg-[#073B4C] hover:scale-110 hover:shadow-xl
                        transition-all duration-500 ease-out group animate-fade-up"
                style="animation-delay: {{ $index * 0.05 }}s;">

                    <!-- Konten utama -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center transition-all duration-500 group-hover:-translate-y-8">
                        @if($item->ikon)
                            <i class="fa-solid {{ $item->ikon }} text-5xl text-[#457B9D] transition-all duration-500 group-hover:text-white"></i>
                        @elseif($item->gambar)
                            <img src="{{ asset('storage/'.$item->gambar) }}" alt="{{ $item->nama }}" class="w-12 h-12 object-contain transition-all duration-500 group-hover:invert">
                        @endif
                        <p class="text-[#073B4C] mt-3 text-sm font-semibold text-center px-2 transition-all duration-500 group-hover:text-white">
                            {{ $item->nama }}
                        </p>
                    </div>

                    <!-- Info tambahan (opsional, kalau ada count/persentase dari DB lain) -->
                    {{-- <div class="absolute bottom-6 left-0 right-0 opacity-0 group-hover:opacity-100 transition-all duration-500 text-white text-xs text-center">
                        <p>Total : {{ $item->count ?? '-' }}</p>
                        <p>%Pers. (Kab) : {{ number_format($item->persentase ?? 0, 2) }}</p>
                    </div> --}}
                </a>
            @endforeach
        </div>

    </div>
</section>

<!-- ANIMASI -->
<style>
@keyframes fade-up {
  0% { opacity: 0; transform: translateY(30px) scale(0.95); }
  100% { opacity: 1; transform: translateY(0) scale(1); }
}
.animate-fade-up { animation: fade-up 0.8s ease-out forwards; }
</style>

@endsection
