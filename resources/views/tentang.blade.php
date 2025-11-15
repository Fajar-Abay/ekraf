@extends('layouts.app')

@section('title', 'Tentang - Ekonomi Kreatif Sumedang')

@section('content')

@php
    $penjelasan = $profile->penjelasan ?? 'Belum ada data profil yang dimasukkan.';
    $gambarUtama = $profile->gambar_utama ? asset('storage/' . $profile->gambar_utama) : asset('images/sumedang_gate.jpeg');
    $gambar1 = $profile->gambar_1 ? asset('storage/' . $profile->gambar_1) : asset('images/sumedang_gate.jpeg');
    $gambar2 = $profile->gambar_2 ? asset('storage/' . $profile->gambar_2) : asset('images/sumedang_gate.jpeg');
@endphp

{{-- ===== HERO SECTION ===== --}}
<section class="relative flex items-center justify-center text-center text-[#073B4C] font-bold overflow-hidden"
    style="background: url('{{ asset('images/sumedang_gate.jpeg') }}') center/cover no-repeat; min-height: 60vh;">
    <div class="absolute inset-0 bg-white/60"></div>
    <div class="relative z-10 px-4 fade-up">
        <h1 class="text-2xl sm:text-4xl md:text-5xl font-bold leading-snug drop-shadow-md">
            Tentang <br> Ekonomi Kreatif
        </h1>
    </div>
</section>

{{-- ===== INTRO BOX ===== --}}
<div class="relative -mt-12 sm:-mt-20 z-20 px-4 fade-up">
    <div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-lg p-6 sm:p-10 text-gray-700 text-center">
        <p class="leading-relaxed text-base sm:text-lg">{{ $penjelasan }}</p>
    </div>
</div>

{{-- ===== CONTENT SECTION ===== --}}
<section class="max-w-6xl mx-auto px-4 sm:px-6 md:px-8 py-12 sm:py-20 space-y-12">

    {{-- Paragraf berwarna --}}
    <div class="bg-[#073B4C] text-white rounded-3xl p-6 sm:p-10 shadow-md fade-up">
        <p class="leading-relaxed text-base sm:text-lg">{{ $penjelasan }}</p>
    </div>

    {{-- Gambar utama --}}
    <div class="w-full flex justify-center fade-up">
        <div class="relative w-full max-w-5xl rounded-3xl overflow-hidden shadow-md border-4 border-[#073B4C]">
            <img
                src="{{ $gambarUtama }}"
                alt="Wilujeng Sumping Sumedang"
                class="w-full h-[250px] sm:h-[350px] md:h-[420px] object-cover transition-transform duration-500 hover:scale-105"
                style="mask-image: linear-gradient(to bottom, black 85%, transparent);
                       -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent);"
            >
        </div>
    </div>

    {{-- Grid konten + gambar --}}
    <div class="grid md:grid-cols-2 gap-6 sm:gap-8 items-stretch">

        {{-- Kolom kiri: dua gambar --}}
        <div class="flex flex-col gap-6 fade-up">
            <img
                src="{{ $gambar1 }}"
                alt="Wilujeng Sumping"
                class="rounded-3xl shadow-md w-full object-cover border-4 border-[#073B4C] h-[200px] sm:h-[260px] md:h-[300px]"
            >
            <img
                src="{{ $gambar2 }}"
                alt="Wilujeng Sumping"
                class="rounded-3xl shadow-md w-full object-cover border-4 border-[#073B4C] h-[200px] sm:h-[260px] md:h-[300px]"
            >
        </div>

        {{-- Kolom kanan: teks --}}
        <div class="bg-white p-6 sm:p-10 rounded-3xl shadow-md text-gray-700 leading-relaxed text-base sm:text-lg flex flex-col justify-center fade-up">
            <p>{{ $penjelasan }}</p>
        </div>

    </div>

    {{-- Paragraf akhir --}}
    <div class="bg-[#073B4C] text-white rounded-3xl p-6 sm:p-10 shadow-md fade-up">
        <p class="leading-relaxed text-base sm:text-lg">{{ $penjelasan }}</p>
    </div>

    {{-- Tombol Hubungi Kami --}}
    <div class="text-center fade-up">
        <a
            href="{{ url('/kontak') }}"
            class="bg-[#6F97A4] text-[#062B37] font-semibold px-6 sm:px-10 py-3 sm:py-4 rounded-xl shadow-md
                   hover:bg-[#094a5a] hover:text-white transition text-sm sm:text-lg"
        >
            Hubungi Kami
        </a>
    </div>

</section>

{{-- ===== SCRIPT ANIMASI FADE-UP ===== --}}
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if(entry.isIntersecting){
                    entry.target.classList.add('opacity-100', 'translate-y-0');
                    entry.target.classList.remove('opacity-0', 'translate-y-10');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.fade-up').forEach(el => {
            el.classList.add('opacity-0', 'translate-y-10', 'transition-all', 'duration-700', 'ease-out');
            observer.observe(el);
        });
    });
</script>

@endsection
