@extends('layouts.app')

@section('title', 'Beranda - Ekonomi Kreatif Sumedang')

@section('content')

<!-- Tambahkan link CSS AOS -->
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

<section style="
    background: url('{{ asset('images/sumedang_gate.jpeg') }}') center/cover no-repeat;
    height: 80vh;
    display: flex;
    align-items: flex-start;
    justify-content: center;
    color: white;
    text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
    font-size: 2.5rem;
    font-weight: 700;
    padding-top: 140px; /* atur jarak dari atas */
">
    <div data-aos="fade-down">Selamat Datang di Ekonomi Kreatif Sumedang</div>
</section>


<section class="relative bg-white -mt-24 z-10 flex flex-col items-center text-center px-4">
    <h2 class="text-[#073B4C] text-2xl md:text-3xl font-semibold mt-10 mb-8" data-aos="fade-up">
        Tentang<br><span class="font-bold">Ekonomi Kreatif</span>
    </h2>

    <div class="relative w-[90%] md:w-[70%] flex flex-col items-center" data-aos="fade-up" data-aos-delay="200">
        <div class="w-full aspect-video border-2 border-[#073B4C] rounded-3xl overflow-hidden shadow-md z-10">
            <img src="{{ asset('images/sumedang_gate.jpeg') }}" 
                alt="Gerbang Sumedang"
                class="w-full h-full object-cover">
        </div>

        <div class="absolute -bottom-20 w-[95%] md:w-[110%] bg-white rounded-3xl shadow-2xl text-center p-8 z-20" data-aos="fade-up" data-aos-delay="400">
            <p class="text-gray-700 text-sm md:text-base leading-relaxed mb-6">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                Maecenas sollicitudin purus vitae eros facilisis, at ultricies nisi auctor. 
                Integer ut sodales enim, nec commodo libero. In vel vehicula nisi.
            </p>
            <a href="#"
               class="bg-[#457B9D] hover:bg-[#356E85] text-white font-medium px-6 py-2 rounded-full transition-all duration-300">
                Lihat Selengkapnya
            </a>
        </div>
    </div>

    <div class="h-40"></div>
</section>

<section class="bg-gray-50 py-16">
    <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-[#073B4C] text-2xl md:text-3xl font-semibold">
            Artikel<br><span class="font-bold">Ekonomi Kreatif</span>
        </h2>
    </div>

    <div class="max-w-6xl mx-auto flex flex-col md:flex-row gap-8 justify-center px-4">
        <div class="flex-1 grid grid-cols-1 md:grid-cols-2 gap-8">
            @for ($i = 0; $i < 2; $i++)
            <div class="bg-white rounded-[2rem] shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300" data-aos="zoom-in" data-aos-delay="{{ $i * 200 }}">
                <img src="{{ asset('images/sumedang_gate.jpeg') }}" alt="Artikel Ekonomi Kreatif" class="w-full h-48 object-cover">
                <div class="p-5 text-left">
                    <h3 class="text-[#073B4C] font-bold text-lg mb-2">Artikel Ekonomi Kreatif</h3>
                    <p class="text-gray-600 text-sm mb-2">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                        Maecenas sollicitudin purus vitae eros facilisis, at ultricies nisi auctor.
                    </p>
                </div>
            </div>
            @endfor
        </div>

        <div class="w-full md:w-1/3 flex flex-col justify-start gap-6">
            @for ($i = 0; $i < 3; $i++)
            <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition-all duration-300" data-aos="fade-left" data-aos-delay="{{ $i * 200 }}">
                <h3 class="text-[#073B4C] font-bold text-sm mb-1">
                    Artikel Ekonomi Kreatif Tahun 2025-2026
                </h3>
                <div class="flex items-center text-gray-500 text-xs gap-2">
                    <i class="fa-regular fa-calendar"></i>
                    <span>Senin, 20 Oktober 2025</span>
                </div>
            </div>
            @endfor
        </div>
    </div>

    <div class="mt-10 text-center" data-aos="fade-up" data-aos-delay="200">
        <a href="#"
           class="bg-[#457B9D] hover:bg-[#356E85] text-white font-medium px-8 py-3 rounded-full transition-all duration-300 shadow-md">
            Lihat Selengkapnya
        </a>
    </div>
</section>

<section class="bg-white py-16">
    <div class="text-center mb-12" data-aos="fade-up">
        <h2 class="text-[#073B4C] text-2xl md:text-3xl font-semibold">
            Subsektor<br><span class="font-bold">Ekonomi Kreatif</span>
        </h2>
        <p class="text-gray-700 text-sm md:text-base max-w-3xl mx-auto leading-relaxed">
            Silakan pilih salah satu subsektor untuk melihat sebaran data berdasarkan subsektor.
        </p>
    </div>

    <div class="max-w-7xl mx-auto px-4">
        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-8">
            @php
                $subsektor = [
                    ['icon' => 'fa-solid fa-masks-theater', 'name' => 'Seni Pertunjukan', 'count' => 178],
                    ['icon' => 'fa-solid fa-music', 'name' => 'Musik', 'count' => 156],
                    ['icon' => 'fa-solid fa-gem', 'name' => 'Kriya', 'count' => 101],
                    ['icon' => 'fa-solid fa-utensils', 'name' => 'Kuliner', 'count' => 101],
                    ['icon' => 'fa-solid fa-paintbrush', 'name' => 'Seni Rupa', 'count' => 62],
                    ['icon' => 'fa-solid fa-shirt', 'name' => 'Fashion', 'count' => 49],
                    ['icon' => 'fa-solid fa-film', 'name' => 'Film, Video dan Animasi', 'count' => 46],
                    ['icon' => 'fa-solid fa-camera', 'name' => 'Fotografi', 'count' => 45],
                    ['icon' => 'fa-solid fa-code', 'name' => 'Aplikasi', 'count' => 28],
                    ['icon' => 'fa-solid fa-cube', 'name' => 'Desain Produk', 'count' => 21],
                    ['icon' => 'fa-solid fa-pen-nib', 'name' => 'Desain Komunikasi Visual', 'count' => 15],
                    ['icon' => 'fa-solid fa-gamepad', 'name' => 'Pengembangan Permainan', 'count' => 12],
                    ['icon' => 'fa-solid fa-book', 'name' => 'Penerbitan', 'count' => 10],
                    ['icon' => 'fa-solid fa-couch', 'name' => 'Desain Interior', 'count' => 9],
                    ['icon' => 'fa-solid fa-bullhorn', 'name' => 'Periklanan', 'count' => 8],
                    ['icon' => 'fa-solid fa-ruler-combined', 'name' => 'Arsitektur', 'count' => 7],
                    ['icon' => 'fa-solid fa-radio', 'name' => 'Radio dan Televisi', 'count' => 3],
                    ['icon' => 'fa-solid fa-pen-fancy', 'name' => 'Sastra', 'count' => 5],
                    ['icon' => 'fa-solid fa-dragon', 'name' => 'Animasi Tradisional', 'count' => 4],
                    ['icon' => 'fa-solid fa-globe', 'name' => 'Wisata Budaya', 'count' => 6],
                ];
            @endphp

            @foreach ($subsektor as $index => $item)
                <div class="bg-white rounded-2xl shadow-md p-6 flex flex-col items-center justify-center text-center 
                            hover:shadow-lg hover:-translate-y-1 transition-all duration-300 h-48"
                     data-aos="fade-up" data-aos-delay="{{ $index * 50 }}">
                    <div class="mb-4 flex justify-center">
                        <div class="bg-[#457B9D]/10 p-5 rounded-full">
                            <i class="{{ $item['icon'] }} text-3xl text-[#457B9D]"></i>
                        </div>
                    </div>
                    <h3 class="text-[#073B4C] font-semibold text-sm md:text-base">{{ $item['name'] }}</h3>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="relative py-16" style="
    background: url('{{ asset('images/sumedang_gate.jpeg') }}') center/cover no-repeat;
    background-attachment: fixed;
    min-height: 70vh;
">
    <div class="absolute inset-0 bg-white opacity-70 backdrop-blur"></div>

    <div class="relative max-w-7xl mx-auto px-4 z-20 text-white" data-aos="fade-up">
        
        <div class="bg-[#0A4D68] p-6 md:p-10 rounded-[2rem] shadow-2xl mb-12" data-aos="zoom-in">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-center">
                
                <div class="flex flex-col items-center justify-center py-4 px-2">
                    <div class="mb-2 text-[#FFD166]">
                        <i class="fa-solid fa-users text-4xl"></i>
                    </div>
                    <p class="text-xl md:text-2xl font-semibold mb-1">Pelaku Ekraf</p>
                    <p class="text-4xl md:text-5xl font-bold">869</p>
                </div>

                <div class="flex flex-col items-center justify-center border-t md:border-t-0 md:border-l border-white border-opacity-30 py-4 px-2">
                    <div class="mb-2 text-[#FFD166]">
                        <i class="fa-solid fa-person text-4xl"></i>
                    </div>
                    <p class="text-xl md:text-2xl font-semibold mb-1">Pelaku Laki-laki</p>
                    <p class="text-4xl md:text-5xl font-bold">483</p>
                </div>

                <div class="flex flex-col items-center justify-center border-t md:border-t-0 md:border-l border-white border-opacity-30 py-4 px-2">
                    <div class="mb-2 text-[#FFD166]">
                        <i class="fa-solid fa-person-dress text-4xl"></i>
                    </div>
                    <p class="text-xl md:text-2xl font-semibold mb-1">Pelaku Perempuan</p>
                    <p class="text-4xl md:text-5xl font-bold">386</p>
                </div>
            </div>
        </div>

        <div class="text-center mb-10" data-aos="fade-up">
            <h3 class="text-3xl font-bold uppercase tracking-wider mb-2 text-[#073B4C]">Rentang Usia</h3>
            <p class="text-base text-[#073B4C]">Silakan pilih salah satu rentang usia untuk melihat sebaran data berdasarkan rentang usia</p>
        </div>

        <div class="max-w-4xl mx-auto" data-aos="fade-up">
            @php
                $usia_data = [
                    ['range' => '< 20 Tahun', 'count' => 27],
                    ['range' => '21-30 Tahun', 'count' => 532],
                    ['range' => '31-40 Tahun', 'count' => 210],
                    ['range' => '41-50 Tahun', 'count' => 74],
                    ['range' => '51-60 Tahun', 'count' => 21],
                    ['range' => '> 60 Tahun', 'count' => 5],
                ];
            @endphp
            
            <div class="grid grid-cols-3 gap-y-8 gap-x-4">
                @foreach ($usia_data as $data)
                <div class="flex flex-col items-center p-2 cursor-pointer transition duration-300" data-aos="zoom-in">
                    <div class="flex items-center gap-1 text-base font-bold mb-2 text-[#073B4C]">
                        <i class="fa-solid fa-user-group text-2xl"></i>
                        <span class="text-xl">{{ $data['range'] }}</span>
                    </div>
                    <div class="bg-[#7598A3] bg-opacity-70 text-white py-2 px-6 rounded-lg text-lg font-bold w-full text-center shadow-lg">
                        {{ $data['count'] }} Pelaku
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <div class="mt-12 flex justify-center" data-aos="fade-up" data-aos-delay="200">
            <div class="bg-[#B1BFC3] text-[#073B4C] py-3 px-[100px] rounded-lg shadow-xl text-center ">
                <p class="text-lg font-semibold mb-1">Rata-rata Usia</p>
                <p class="text-3xl font-bold text-white">27 Tahun</p>
            </div>
        </div>
    </div>
</section>

<!-- Tambahkan script AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 1000, // Durasi animasi (ms)
        once: true,     // Animasi hanya muncul sekali
        easing: 'ease-in-out',
    });
</script>

@endsection
