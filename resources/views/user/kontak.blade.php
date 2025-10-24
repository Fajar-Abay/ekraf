@extends('layouts.app')

@section('title', 'Kontak - Ekonomi Kreatif Sumedang')

@section('content')

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
    <h1 class="relative z-10 text-3xl md:text-5xl font-bold">Hubungi Kami</h1>
</section>

<section class="bg-white py-12">
    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-6 text-center px-4">

        <div class="bg-[#7598A3] text-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all">
            <i class="fa-solid fa-location-dot text-4xl mb-4"></i>
            <p class="font-semibold text-[#062B37]">Dinas Pariwisata, Kebudayaan, Kepemudaan, dan Olahraga</p>
            <p class="text-sm mt-2">Jl. Prabu Geusan Ulun No. 36, Regol Wetan, Sumedang Selatan</p>
        </div>

        <div class="bg-[#7598A3] text-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all">
            <i class="fa-solid fa-envelope text-4xl mb-4"></i>
            <p class="font-semibold text-[#062B37]">Email</p>
            <p class="text-sm mt-2">disparbudporasumedang@gmail.com</p>
        </div>

        <div class="bg-[#7598A3] text-white rounded-2xl p-6 shadow-md hover:shadow-xl transition-all">
            <i class="fa-solid fa-phone text-4xl mb-4"></i>
            <p class="font-semibold text-[#062B37]">Mobile</p>
            <p class="text-sm mt-2">
                (0813-2601-9291)<br>
                (0852-2026-9101)<br>
                (0855-7719-0513)
            </p>
        </div>

    </div>
</section>

<section class="bg-white py-16">
    <div class="max-w-6xl mx-auto px-6">
        <h2 class="text-center text-2xl md:text-3xl font-bold text-[#073B4C] mb-4">Kontak Kami</h2>
        <p class="text-center text-gray-700 mb-10">
            Jika Anda memiliki pertanyaan, kritik, atau saran tentang Database Ekonomi Kreatif Sumedang, silakan hubungi kami:
        </p>

        <div class="flex justify-center">
            <div class="w-full max-w-6xl grid grid-cols-1 md:grid-cols-2 gap-10 py-10 px-8 rounded-[3rem] shadow-2xl" style="background-color: #A9D6E5;">
                
                <div class="rounded-2xl shadow-xl overflow-hidden bg-white">
                    <iframe
                        src="https://maps.google.com/maps?q=Jl.%20Prabu%20Geusan%20Ulun%20No.36,%20Regol%20Wetan,%20Sumedang%20Selatan,%20Kabupaten%20Sumedang,%20Jawa%20Barat&t=&z=15&ie=UTF8&iwloc=&output=embed"
                        width="100%" height="350" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded-t-2xl"></iframe>
                    </div>

                <div class="p-0">
                    <form class="space-y-4">
                        @php
                            // Class untuk input: placeholder dan teks input berwarna #073B4C
                            $input_class = 'w-full p-3 rounded-md border border-gray-200 shadow-md focus:outline-none focus:ring-2 focus:ring-[#073B4C] placeholder-[#073B4C] bg-white/50 backdrop-blur-sm text-[#073B4C]';
                        @endphp
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 ">
                            <input type="text" placeholder="Masukkan Nama Lengkap..." class="{{ $input_class }}">
                            <input type="email" placeholder="Masukkan Email..." class="{{ $input_class }}">
                        </div>

                        <select class="{{ $input_class }}">
                            <option disabled selected>Pilih subjek...</option>
                            <option>Pertanyaan</option>
                            <option>Saran</option>
                            <option>Kritik</option>
                        </select>

                        <textarea placeholder="Masukkan Pesan..." rows="4" class="{{ $input_class }}"></textarea>

                        <div class="flex gap-4 pt-4 justify-start">
                            <button type="submit" class="flex items-center bg-[#073B4C] text-white px-6 py-3 rounded-lg shadow-md hover:bg-[#0A4D68] transition font-semibold">
                                <i class="fa-solid fa-paper-plane mr-2 hidden"></i> Kirim Pesan
                            </button>
                            <button type="reset" class="bg-[#457B9D] text-white px-6 py-3 rounded-lg shadow-md hover:bg-[#346682] transition font-semibold">
                                Reset
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection