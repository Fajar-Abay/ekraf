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
            @php
                $subsektor = [
                    ['icon' => 'fa-masks-theater', 'name' => 'Seni Pertunjukan', 'count' => 178, 'persentase' => 20.48],
                    ['icon' => 'fa-music', 'name' => 'Musik', 'count' => 156, 'persentase' => 18.33],
                    ['icon' => 'fa-gem', 'name' => 'Kriya', 'count' => 101, 'persentase' => 11.86],
                    ['icon' => 'fa-utensils', 'name' => 'Kuliner', 'count' => 101, 'persentase' => 11.86],
                    ['icon' => 'fa-paintbrush', 'name' => 'Seni Rupa', 'count' => 62, 'persentase' => 7.28],
                    ['icon' => 'fa-shirt', 'name' => 'Fashion', 'count' => 49, 'persentase' => 5.75],
                    ['icon' => 'fa-film', 'name' => 'Film, Video dan Animasi', 'count' => 46, 'persentase' => 5.41],
                    ['icon' => 'fa-camera', 'name' => 'Fotografi', 'count' => 45, 'persentase' => 5.29],
                    ['icon' => 'fa-code', 'name' => 'Aplikasi', 'count' => 28, 'persentase' => 3.29],
                    ['icon' => 'fa-cube', 'name' => 'Desain Produk', 'count' => 21, 'persentase' => 2.47],
                    ['icon' => 'fa-pen-nib', 'name' => 'Desain Komunikasi Visual', 'count' => 15, 'persentase' => 1.76],
                    ['icon' => 'fa-gamepad', 'name' => 'Pengembangan Permainan', 'count' => 12, 'persentase' => 1.41],
                    ['icon' => 'fa-book', 'name' => 'Penerbitan', 'count' => 10, 'persentase' => 1.18],
                    ['icon' => 'fa-couch', 'name' => 'Desain Interior', 'count' => 9, 'persentase' => 1.06],
                    ['icon' => 'fa-bullhorn', 'name' => 'Periklanan', 'count' => 8, 'persentase' => 0.94],
                    ['icon' => 'fa-ruler-combined', 'name' => 'Arsitektur', 'count' => 7, 'persentase' => 0.82],
                    ['icon' => 'fa-radio', 'name' => 'Radio dan Televisi', 'count' => 3, 'persentase' => 0.35],
                    ['icon' => 'fa-pen-fancy', 'name' => 'Sastra', 'count' => 5, 'persentase' => 0.59],
                    ['icon' => 'fa-dragon', 'name' => 'Animasi Tradisional', 'count' => 4, 'persentase' => 0.47],
                    ['icon' => 'fa-globe', 'name' => 'Wisata Budaya', 'count' => 6, 'persentase' => 0.71],
                ];
            @endphp

            @foreach ($subsektor as $index => $item)
                <a href="{{ url('sektor/detail/' . Str::slug($item['name'])) }}"
                   class="relative flex items-center justify-center w-48 h-48 mx-auto rounded-full 
                          bg-[#F9FAFB] border-4 border-[#073B4C] shadow-md overflow-hidden
                          hover:bg-[#073B4C] hover:scale-110 hover:shadow-xl
                          transition-all duration-500 ease-out group animate-fade-up"
                   style="animation-delay: {{ $index * 0.05 }}s;">

                    <!-- Konten utama -->
                    <div class="absolute inset-0 flex flex-col items-center justify-center text-center transition-all duration-500 group-hover:-translate-y-8">
                        <i class="fa-solid {{ $item['icon'] }} text-5xl text-[#457B9D] transition-all duration-500 group-hover:text-white"></i>
                        <p class="text-[#073B4C] mt-3 text-sm font-semibold text-center px-2 transition-all duration-500 group-hover:text-white">
                            {{ $item['name'] }}
                        </p>
                    </div>

                    <!-- Info tambahan -->
                    <div class="absolute bottom-6 left-0 right-0 opacity-0 group-hover:opacity-100 transition-all duration-500 text-white text-xs text-center">
                        <p>Total : {{ $item['count'] }}</p>
                        <p>%Pers. (Kab) : {{ number_format($item['persentase'], 2) }}</p>
                    </div>
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
