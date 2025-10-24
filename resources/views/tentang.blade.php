@extends('layouts.app')

@section('title', 'Tentang - Ekonomi Kreatif Sumedang')

@section('content')

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section style="
    background: url('{{ asset('images/sumedang_gate.jpeg') }}') center/cover no-repeat;
    height: 70vh;
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
    <h1 class="relative z-10 text-3xl md:text-5xl font-bold text-center">Tentang <br> Ekonomi Kreatif</h1>
</section>

<div class="relative -mt-20 z-20" data-aos="fade-up" data-aos-delay="100">
    <div class="max-w-7xl mx-auto bg-white rounded-[2.5rem] shadow-lg p-10 text-gray-700 text-center">
        <p class="leading-relaxed text-lg">
            {{ $profile->penjelasan ?? 'Belum ada data profil yang dimasukkan.' }}
        </p>
    </div>
</div>

<section class="max-w-6xl mx-auto px-6 py-20 space-y-12">

    <div class="bg-[#073B4C] max-w-5xl mx-auto text-white rounded-[2.5rem] p-8 shadow-md" data-aos="fade-up" data-aos-delay="200">
        <p class="leading-relaxed text-lg">
            {{ $profile->penjelasan ?? 'Belum ada deskripsi yang diisi.' }}
        </p>
    </div>

    <div class="w-full flex justify-center" data-aos="zoom-in" data-aos-delay="300">
        <div class="relative w-full max-w-6xl rounded-[2.5rem] overflow-hidden shadow-md border-4 border-[#073B4C]">
            <img
                src="{{ $profile->gambar_utama ? asset('storage/' . $profile->gambar_utama) : asset('images/sumedang_gate.jpeg') }}"
                alt="Wilujeng Sumping Sumedang"
                class="w-full h-[420px] object-cover"
                style="mask-image: linear-gradient(to bottom, black 85%, transparent);
                       -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent);"
            >
        </div>
    </div>

    <div class="grid md:grid-cols-2 gap-8 items-stretch">

        <div class="flex flex-col gap-6" data-aos="fade-right">
            <img
                src="{{ $profile->gambar_1 ? asset('storage/' . $profile->gambar_1) : asset('images/sumedang_gate.jpeg') }}"
                alt="Wilujeng Sumping"
                class="rounded-[2rem] shadow-md w-full object-cover border-4 border-[#073B4C]"
            >
            <img
                src="{{ $profile->gambar_2 ? asset('storage/' . $profile->gambar_2) : asset('images/sumedang_gate.jpeg') }}"
                alt="Wilujeng Sumping"
                class="rounded-[2rem] shadow-md w-full object-cover border-4 border-[#073B4C]"
            >
        </div>

        <div class="bg-white p-8 rounded-[2.5rem] shadow-md text-gray-700 leading-relaxed text-lg flex flex-col justify-center"
            data-aos="fade-left" data-aos-delay="200">
            <p>
                {{ $profile->penjelasan ?? 'Belum ada penjelasan tambahan.' }}
            </p>
        </div>

    </div>

    <div class="bg-[#073B4C] text-white rounded-[2.5rem] p-8 shadow-md" data-aos="fade-up">
        <p class="leading-relaxed text-lg">
            {{ $profile->penjelasan ?? 'Belum ada informasi tambahan.' }}
        </p>
    </div>

    <div class="text-center" data-aos="zoom-in" data-aos-delay="150">
        <a
            href="{{ url('/kontak') }}"
            class="bg-[#6F97A4] text-[#062B37] font-semibold px-8 py-4 rounded-xl shadow-md
                   hover:bg-[#094a5a] hover:text-white transition text-lg"
        >
            Hubungi Kami
        </a>
    </div>

</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000,
        once: true,
        easing: 'ease-in-out'
    });
</script>

@endsection
