@extends('layouts.app')

@section('title', 'Tentang - Ekonomi Kreatif Sumedang')

@section('content')

<!-- Tambahkan link CSS AOS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<!-- HERO SECTION -->
<section 
    class="relative h-[80vh] flex items-center justify-center text-center text-white" 
    style="background: url('{{ asset('images/sumedang_gate.jpeg') }}') center/cover no-repeat;"
>
    <div class="absolute inset-0 bg-black/40"></div>
    <div class="relative z-10" data-aos="fade-down">
        <h1 class="text-4xl sm:text-5xl font-bold mb-2">Tentang</h1>
        <p class="text-2xl sm:text-3xl font-semibold">Ekonomi Kreatif</p>
    </div>
</section>

<!-- CARD PUTIH MENGAPUNG DI ATAS FOTO -->
<div class="relative -mt-20 z-20" data-aos="fade-up" data-aos-delay="100">
    <div class="max-w-7xl mx-auto bg-white rounded-[2.5rem] shadow-lg p-10 text-gray-700 text-center">
        <p class="leading-relaxed text-lg">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros facilisis, 
            at ultricies nisi auctor. Integer ut sodales enim, nec commodo libero. In vel vehicula nisi.
        </p>
    </div>
</div>

<!-- KONTEN UTAMA -->
<section class="max-w-6xl mx-auto px-6 py-20 space-y-12">

    <!-- Card biru -->
    <div class="bg-[#073B4C] max-w-5xl mx-auto text-white rounded-[2.5rem] p-8 shadow-md" data-aos="fade-up" data-aos-delay="200">
        <p class="leading-relaxed text-lg">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros facilisis, 
            at ultricies nisi auctor. Integer ut sodales enim, nec commodo libero. In vel vehicula nisi.
        </p>
    </div>

    <!-- Foto besar -->
    <div class="w-full flex justify-center" data-aos="zoom-in" data-aos-delay="300">
        <div class="relative w-full max-w-6xl rounded-[2.5rem] overflow-hidden shadow-md border-4 border-[#073B4C]">
            <img 
                src="{{ asset('images/sumedang_gate.jpeg') }}" 
                alt="Wilujeng Sumping Sumedang" 
                class="w-full h-[420px] object-cover"
                style="mask-image: linear-gradient(to bottom, black 85%, transparent); 
                       -webkit-mask-image: linear-gradient(to bottom, black 85%, transparent);"
            >
        </div>
    </div>

    <!-- Dua foto kecil + card putih -->
    <div class="grid md:grid-cols-2 gap-8 items-stretch">

        <!-- Kolom Gambar -->
        <div class="flex flex-col gap-6" data-aos="fade-right">
            <img 
                src="{{ asset('images/sumedang_gate.jpeg') }}" 
                alt="Wilujeng Sumping" 
                class="rounded-[2rem] shadow-md w-full object-cover border-4 border-[#073B4C]"
            >
            <img 
                src="{{ asset('images/sumedang_gate.jpeg') }}" 
                alt="Wilujeng Sumping" 
                class="rounded-[2rem] shadow-md w-full object-cover border-4 border-[#073B4C]"
            >
        </div>

        <!-- Kolom Teks -->
        <div class="bg-white p-8 rounded-[2.5rem] shadow-md text-gray-700 leading-relaxed text-lg flex flex-col justify-center" 
            data-aos="fade-left" data-aos-delay="200">
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae risus finibus, 
                at sodales lacus luctus. Vivamus convallis, libero sit amet dignissim tincidunt, mi nibh vulputate lorem, 
                nec fermentum lorem mi vel lectus. Integer ac tempor erat, in efficitur nisl.
                
                Nam euismod lacus sed placerat commodo. Suspendisse potenti. Aenean ac nunc non ex consectetur vehicula.<br><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae risus finibus, 
                at sodales lacus luctus. Vivamus convallis, libero sit amet dignissim tincidunt, mi nibh vulputate lorem, 
                nec fermentum lorem mi vel lectus. Integer ac tempor erat, in efficitur nisl.

                Nam euismod lacus sed placerat commodo. Suspendisse potenti. Aenean ac nunc non ex consectetur vehicula.<br><br>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae risus finibus, 
                at sodales lacus luctus. Vivamus convallis, libero sit amet dignissim tincidunt, mi nibh vulputate lorem, 
                nec fermentum lorem mi vel lectus.
            </p>
        </div>

    </div>



    <!-- Card biru bawah -->
    <div class="bg-[#073B4C] text-white rounded-[2.5rem] p-8 shadow-md" data-aos="fade-up">
        <p class="leading-relaxed text-lg">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae risus finibus, 
            at sodales lacus luctus. Vivamus convallis, libero sit amet dignissim tincidunt, mi nibh vulputate lorem, 
            nec fermentum lorem mi vel lectus.
        </p>
    </div>

<!-- Tombol Hubungi Kami -->
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

<!-- Tambahkan script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // durasi animasi (ms)
        once: true,     // animasi hanya sekali
        easing: 'ease-in-out'
    });
</script>

@endsection
