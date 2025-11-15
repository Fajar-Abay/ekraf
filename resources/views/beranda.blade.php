@extends('layouts.app')

@section('title', 'Beranda - Ekonomi Kreatif Sumedang')

@section('content')
@php
    use Illuminate\Support\Str;
@endphp

<!-- HERO SLIDER SECTION -->
<div class="relative w-full h-[60vh] sm:h-[70vh] md:h-[80vh] lg:h-[85vh] overflow-hidden font-sans"
    x-data="{
        active: 0,
        totalSlides: {{ count($sliders) }},
        interval: null,
        init() {
            this.startAutoSlide();
            document.addEventListener('visibilitychange', () => {
                if (document.hidden) this.stopAutoSlide();
                else this.startAutoSlide();
            });
        },
        startAutoSlide() {
            this.stopAutoSlide();
            this.interval = setInterval(() => this.nextSlide(), 6000);
        },
        stopAutoSlide() {
            if (this.interval) clearInterval(this.interval);
            this.interval = null;
        },
        nextSlide() {
            this.active = (this.active + 1) % this.totalSlides;
        },
        prevSlide() {
            this.active = (this.active - 1 + this.totalSlides) % this.totalSlides;
        },
        goToSlide(index) {
            this.active = index;
            this.startAutoSlide();
        }
    }"
>
    <!-- Slides Container -->
    <div class="absolute inset-0">
        @foreach ($sliders as $index => $slide)
            <div
                x-show="active === {{ $index }}"
                x-transition:enter="transition ease-out duration-1000"
                x-transition:enter-start="opacity-0 scale-105"
                x-transition:enter-end="opacity-100 scale-100"
                x-transition:leave="transition ease-in duration-1000"
                x-transition:leave-start="opacity-100 scale-100"
                x-transition:leave-end="opacity-0 scale-95"
                class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('{{ asset('storage/' . $slide->gambar) }}')"
            >
                <!-- Gradient Overlay -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent"></div>

                <!-- Content -->
                <div class="absolute inset-0 flex items-end pb-8 sm:pb-12 md:pb-16 lg:pb-20 px-4 sm:px-6 md:px-8">
                    <div class="w-full max-w-2xl lg:max-w-4xl mx-auto text-center text-white">
                        <h1 class="text-2xl sm:text-3xl md:text-4xl lg:text-5xl xl:text-6xl font-bold mb-3 sm:mb-4 leading-tight drop-shadow-lg">
                            {{ $slide->judul }}
                        </h1>
                        <p class="text-sm sm:text-base md:text-lg text-gray-200 mb-4 sm:mb-6 leading-relaxed max-w-2xl mx-auto">
                            {{ Str::limit(strip_tags($slide->deskripsi), 120) }}
                        </p>
                        <a href="#tentang"
                            class="inline-block bg-[#FFD166] text-[#073B4C] font-semibold text-xs sm:text-sm px-4 sm:px-6 py-2.5 sm:py-3 rounded-full shadow-lg hover:bg-[#F4B740] hover:scale-105 transform transition-all duration-300">
                            Pelajari Lebih Lanjut
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Navigation Arrows -->
    <button
        @click="prevSlide()"
        class="absolute left-2 sm:left-4 md:left-6 top-1/2 -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white p-2 sm:p-3 rounded-full transition-all duration-300 backdrop-blur-sm"
        aria-label="Slide sebelumnya"
    >
        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>

    <button
        @click="nextSlide()"
        class="absolute right-2 sm:right-4 md:right-6 top-1/2 -translate-y-1/2 z-30 bg-black/30 hover:bg-black/50 text-white p-2 sm:p-3 rounded-full transition-all duration-300 backdrop-blur-sm"
        aria-label="Slide berikutnya"
    >
        <svg class="w-4 h-4 sm:w-5 sm:h-5 md:w-6 md:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Dots Indicator -->
    <div class="absolute bottom-4 sm:bottom-6 left-1/2 -translate-x-1/2 flex gap-2 z-30">
        @foreach ($sliders as $index => $slide)
            <button
                @click="goToSlide({{ $index }})"
                :class="active === {{ $index }}
                    ? 'w-3 h-3 bg-[#FFD166] scale-110 shadow-lg'
                    : 'w-2 h-2 bg-white/60 hover:bg-white/80'"
                class="rounded-full transition-all duration-300"
                aria-label="Pergi ke slide {{ $index + 1 }}"
            ></button>
        @endforeach
    </div>
</div>

<!-- ABOUT SECTION -->
<section id="tentang" class="relative bg-white py-12 sm:py-16 md:py-20 lg:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-8 sm:mb-12 md:mb-16" data-aos="fade-up">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#073B4C] mb-3 sm:mb-4">
                Tentang <span class="block text-[#FFD166]">Ekonomi Kreatif</span>
            </h2>
            <div class="w-16 h-1 bg-[#073B4C] mx-auto rounded-full"></div>
        </div>

        <!-- Content Grid -->
        <div class="relative max-w-6xl mx-auto">
            <!-- Main Image -->
            <div class="relative mb-8 sm:mb-12" data-aos="zoom-in">
                <div class="aspect-w-16 aspect-h-9 rounded-2xl sm:rounded-3xl overflow-hidden shadow-xl border-4 border-[#073B4C]">
                    <img
                        src="{{ asset('images/sumedang_gate.jpeg') }}"
                        alt="Gerbang Sumedang"
                        class="w-full h-48 sm:h-64 md:h-80 lg:h-96 object-cover"
                    >
                </div>
            </div>

            <!-- Floating Card -->
            <div class="relative -mt-6 sm:-mt-12 md:-mt-16 lg:-mt-20 mx-4 sm:mx-8" data-aos="fade-up" data-aos-delay="200">
                <div class="bg-white rounded-2xl sm:rounded-3xl shadow-2xl p-6 sm:p-8 md:p-10 lg:p-12 border border-gray-100">
                    <div class="text-center">
                        <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#073B4C] rounded-full flex items-center justify-center mx-auto mb-4 sm:mb-6">
                            <i class="fa-solid fa-lightbulb text-white text-lg sm:text-xl"></i>
                        </div>
                        <p class="text-gray-700 text-sm sm:text-base md:text-lg leading-relaxed mb-6 sm:mb-8">
                            {{ Str::limit(strip_tags($profile->penjelasan), 300) }}
                        </p>
                        <a href="{{ route('tentang') }}"
                           class="inline-flex items-center justify-center bg-[#457B9D] hover:bg-[#356E85] text-white font-medium px-6 sm:px-8 py-2.5 sm:py-3 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                            <span class="mr-2">Lihat Selengkapnya</span>
                            <i class="fa-solid fa-arrow-right text-sm"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ARTICLES SECTION -->
<section class="bg-gray-50 py-12 sm:py-16 md:py-20 lg:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-8 sm:mb-12 md:mb-16" data-aos="fade-up">
            <h2 class="text-2xl sm:text-3xl md:text-4xl font-bold text-[#073B4C] mb-3 sm:mb-4">
                Artikel <span class="block text-[#FFD166]">Ekonomi Kreatif</span>
            </h2>
            <div class="w-16 h-1 bg-[#073B4C] mx-auto rounded-full"></div>
        </div>

        <!-- Articles Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6 sm:gap-8 mb-8 sm:mb-12">
            @foreach ($artikels as $index => $artikel)
            <div class="bg-white rounded-xl sm:rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 group"
                 data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                <!-- Article Image -->
                <div class="relative overflow-hidden">
                    <img
                        src="{{ $artikel->gambar ? asset('storage/'.$artikel->gambar) : asset('image/bg.jpg') }}"
                        alt="{{ $artikel->judul }}"
                        class="w-full h-40 sm:h-48 md:h-56 object-cover group-hover:scale-105 transition-transform duration-500"
                    />
                    <div class="absolute inset-0 bg-black/10 group-hover:bg-black/20 transition-colors duration-300"></div>
                </div>

                <!-- Article Content -->
                <div class="p-4 sm:p-6">
                    <h3 class="text-[#073B4C] font-bold text-lg sm:text-xl mb-2 line-clamp-2">
                        {{ $artikel->judul }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-3 sm:mb-4 line-clamp-3 leading-relaxed">
                        {{ Str::limit(strip_tags($artikel->isi), 120) }}
                    </p>
                    <div class="flex items-center justify-between text-xs sm:text-sm text-gray-500">
                        <span>By {{ $artikel->penulis }}</span>
                        <span>{{ $artikel->created_at->format('d M Y') }}</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- View All Button -->
        <div class="text-center" data-aos="zoom-in" data-aos-delay="200">
            <a href="{{ route('user.artikel') }}"
               class="inline-flex items-center justify-center bg-[#457B9D] hover:bg-[#356E85] text-white font-medium px-6 sm:px-8 py-3 sm:py-4 rounded-full transition-all duration-300 shadow-lg hover:shadow-xl hover:scale-105">
                <span class="mr-2">Lihat Semua Artikel</span>
                <i class="fa-solid fa-newspaper"></i>
            </a>
        </div>
    </div>
</section>

<!-- STATISTICS SECTION -->
<section class="relative py-12 sm:py-16 md:py-20 lg:py-24 bg-cover bg-center bg-fixed"
    style="background-image: url('{{ asset('images/sumedang_gate.jpeg') }}');">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-white/90 backdrop-blur-sm"></div>

    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Main Stats Card -->
        <div class="bg-gradient-to-br from-[#0A4D68] to-[#073B4C] text-white rounded-2xl sm:rounded-3xl p-6 sm:p-8 md:p-10 lg:p-12 shadow-2xl mb-8 sm:mb-12 md:mb-16"
             data-aos="fade-up">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8 text-center">
                <!-- Total Pelaku -->
                <div class="flex flex-col items-center justify-center py-4 sm:py-6" data-aos="zoom-in" data-aos-delay="100">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#FFD166] rounded-full flex items-center justify-center mb-3 sm:mb-4">
                        <i class="fa-solid fa-users text-[#073B4C] text-lg sm:text-xl"></i>
                    </div>
                    <p class="text-lg sm:text-xl font-semibold mb-2">Pelaku Ekraf</p>
                    <p class="text-3xl sm:text-4xl md:text-5xl font-bold">{{ $totalPelaku }}</p>
                </div>

                <!-- Laki-laki -->
                <div class="flex flex-col items-center justify-center py-4 sm:py-6 border-t md:border-t-0 md:border-l border-white/30 pt-6 md:pt-0"
                     data-aos="zoom-in" data-aos-delay="200">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#FFD166] rounded-full flex items-center justify-center mb-3 sm:mb-4">
                        <i class="fa-solid fa-person text-[#073B4C] text-lg sm:text-xl"></i>
                    </div>
                    <p class="text-lg sm:text-xl font-semibold mb-2">Laki-laki</p>
                    <p class="text-3xl sm:text-4xl md:text-5xl font-bold">{{ $pelakuLaki }}</p>
                </div>

                <!-- Perempuan -->
                <div class="flex flex-col items-center justify-center py-4 sm:py-6 border-t md:border-t-0 md:border-l border-white/30 pt-6 md:pt-0"
                     data-aos="zoom-in" data-aos-delay="300">
                    <div class="w-12 h-12 sm:w-16 sm:h-16 bg-[#FFD166] rounded-full flex items-center justify-center mb-3 sm:mb-4">
                        <i class="fa-solid fa-person-dress text-[#073B4C] text-lg sm:text-xl"></i>
                    </div>
                    <p class="text-lg sm:text-xl font-semibold mb-2">Perempuan</p>
                    <p class="text-3xl sm:text-4xl md:text-5xl font-bold">{{ $pelakuPerempuan }}</p>
                </div>
            </div>
        </div>

        <!-- Age Range Section -->
        <div class="text-center mb-8 sm:mb-12" data-aos="fade-up">
            <h3 class="text-xl sm:text-2xl md:text-3xl font-bold text-[#073B4C] mb-2 sm:mb-3">Rentang Usia</h3>
            <p class="text-sm sm:text-base text-[#073B4C]/80">Sebaran pelaku Ekraf berdasarkan usia</p>
        </div>

        <!-- Age Grid -->
        <div class="max-w-4xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 mb-8 sm:mb-12">
            @foreach ($usia_data as $index => $data)
            <div class="bg-white/80 backdrop-blur-sm rounded-xl sm:rounded-2xl p-4 sm:p-6 shadow-lg hover:shadow-xl transition-all duration-300 border border-white"
                 data-aos="flip-up" data-aos-delay="{{ $index * 100 }}">
                <div class="text-center">
                    <div class="text-base sm:text-lg font-bold text-[#073B4C] mb-2 sm:mb-3">
                        {{ $data->rentang_usia }}
                    </div>
                    <div class="bg-[#7598A3] text-white py-2 sm:py-3 px-4 sm:px-6 rounded-lg text-lg sm:text-xl font-bold shadow-md">
                        {{ $data->jumlah }} Pelaku
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Average Age -->
        <div class="flex justify-center" data-aos="zoom-in" data-aos-delay="200">
            <div class="bg-gradient-to-r from-[#B1BFC3] to-[#94A8AF] text-[#073B4C] py-4 sm:py-6 px-6 sm:px-12 rounded-xl sm:rounded-2xl shadow-xl text-center">
                <p class="text-sm sm:text-base font-semibold mb-1 sm:mb-2">Rata-rata Usia</p>
                <p class="text-2xl sm:text-3xl md:text-4xl font-bold text-white drop-shadow-sm">
                    {{ number_format($rataUsia, 1) }} Tahun
                </p>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.aspect-w-16 {
    position: relative;
}

.aspect-w-16::before {
    content: '';
    display: block;
    padding-bottom: 56.25%; /* 16:9 aspect ratio */
}

.aspect-w-16 > * {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
            easing: 'ease-out-cubic',
            disable: window.innerWidth < 640
        });

        // Re-init AOS on resize for mobile
        window.addEventListener('resize', function() {
            AOS.refresh();
        });
    });
</script>
@endpush
