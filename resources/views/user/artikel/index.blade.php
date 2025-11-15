@extends('layouts.app')

@section('title', 'Artikel - Ekonomi Kreatif Sumedang')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12 ">
    <!-- Header dengan animasi -->
    <div class="mb-12" data-aos="fade-down" data-aos-duration="800">
        <h1 class="text-3xl md:text-4xl font-bold text-[#073B4C] text-center mb-4">Artikel Ekonomi Kreatif</h1>
        <p class="text-gray-600 text-center max-w-2xl mx-auto ">
            Temukan inspirasi dan informasi terbaru seputar perkembangan ekonomi kreatif di Sumedang
        </p>
        <!-- Form pencarian -->
       <form action="{{ route('user.artikel') }}" method="GET" class="relative mt-6 flex flex-col items-center">
            <div class="relative w-full md:w-96">
                <input
                    id="search"
                    type="text"
                    name="q"
                    placeholder="Cari artikel..."
                    value="{{ request('q') }}" {{-- agar kata kunci tetap muncul setelah pencarian --}}
                    class="w-full pl-12 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-[#118AB2] transition-all duration-300"
                />

                <!-- Tombol ikon search -->
                <button type="submit"
                    class="absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#118AB2] transition-colors">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </div>
        </form>


    </div>

    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($berita as $index => $artikel)
            <div
                data-aos="fade-up"
                data-aos-duration="800"
                data-aos-delay="{{ ($index % 3) * 100 }}"
                class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 flex flex-col group transform hover:-translate-y-2"
            >
                <!-- Gambar dengan overlay -->
                <div class="h-48 w-full overflow-hidden relative">
                    <img
                        src="{{ $artikel->gambar ? asset('storage/'.$artikel->gambar) : asset('images/bg.jpg') }}"
                        alt="{{ $artikel->judul }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                    />
                    <div class="absolute inset-0 bg-opacity-0 group-hover:bg-opacity-10 transition-all duration-300"></div>
                    <!-- Badge Tanggal -->
                    <div class="absolute top-4 left-4">
                        <span class="px-3 py-1 bg-[#EF476F] text-white text-xs font-bold rounded-full shadow-lg">
                            {{ $artikel->created_at->format('d M') }}
                        </span>
                    </div>
                </div>

                <!-- Konten artikel -->
                <div class="p-6 flex flex-col flex-1">
                    <h2 class="text-[#073B4C] font-bold text-xl mb-3 line-clamp-2 group-hover:text-[#457B9D] transition-colors duration-300">
                        {{ $artikel->judul }}
                    </h2>

                    <p class="text-gray-600 text-sm mb-4 line-clamp-3 flex-1">
                        {{ Str::limit(strip_tags($artikel->isi), 150) }}
                    </p>

                    <!-- Meta informasi -->
                    <div class="flex items-center justify-between text-xs text-gray-500 mb-4">
                        <div class="flex items-center space-x-4">
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $artikel->penulis }}</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $artikel->created_at->format('Y') }}</span>
                            </div>
                        </div>
                        <div class="flex items-center space-x-1 text-[#457B9D]">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                            </svg>
                            <span>{{ $artikel->created_at->diffForHumans() }}</span>
                        </div>
                    </div>

                    <!-- Tombol baca selengkapnya -->
                    <a href="{{ route('user.artikel.show', $artikel->id) }}"
                       class="mt-auto inline-flex items-center justify-center gap-2 bg-gradient-to-r from-[#457B9D] to-[#118AB2] hover:from-[#356E85] hover:to-[#0F7A9D] text-white font-medium px-6 py-3 rounded-full transition-all duration-300 transform group-hover:scale-105 shadow-lg group-hover:shadow-xl">
                        Baca Selengkapnya
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Empty State -->
    @if($berita->count() == 0)
    <div data-aos="fade-up" data-aos-duration="800" class="text-center py-12">
        <div class="max-w-md mx-auto">
            <svg class="w-24 h-24 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9m0 0v3m0-3a2 2 0 012-2h2a2 2 0 012 2m0 0v3m0 0a2 2 0 01-2 2h-2a2 2 0 01-2-2"/>
            </svg>
            <h3 class="text-xl font-bold text-gray-600 mb-2">Belum Ada Artikel</h3>
            <p class="text-gray-500">Saat ini belum ada artikel yang tersedia. Silakan kembali lagi nanti.</p>
        </div>
    </div>
    @endif

    <!-- Pagination dengan animasi -->
    @if($berita->hasPages())
    <div data-aos="fade-up" data-aos-duration="800" class="mt-12 flex justify-center">
        <div class="bg-white rounded-2xl shadow-lg p-4">
            {{ $berita->links() }}
        </div>
    </div>
    @endif

    <!-- CTA Section -->
    <div data-aos="fade-up" data-aos-duration="800" class="mt-16 text-center">
        <div class="bg-gradient-to-r from-[#073B4C] to-[#457B9D] rounded-3xl p-8 md:p-12 text-white">
            <h2 class="text-2xl md:text-3xl font-bold mb-4">Ingin Menjadi Bagian dari Ekonomi Kreatif Sumedang?</h2>
            <p class="text-blue-100 mb-6 max-w-2xl mx-auto">
                Bergabunglah dengan komunitas kreatif Sumedang dan kembangkan potensi bisnis Anda bersama kami.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <button class="px-8 py-3 bg-white text-[#073B4C] font-bold rounded-full hover:bg-gray-100 transition-all duration-300 transform hover:scale-105">
                    Daftar Sekarang
                </button>
                <button class="px-8 py-3 border-2 border-white text-white font-bold rounded-full hover:bg-white hover:text-[#073B4C] transition-all duration-300 transform hover:scale-105">
                    Pelajari Lebih Lanjut
                </button>
            </div>
        </div>
    </div>
</div>

<!-- AOS Initialization Script -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        AOS.init({
            duration: 800,
            once: true,
            offset: 100
        });
    });
</script>

<style>
    /* Custom Pagination Styles */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination .page-link {
        padding: 0.5rem 1rem;
        border-radius: 0.75rem;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .pagination .active .page-link {
        background: linear-gradient(135deg, #457B9D, #118AB2);
        border-color: #457B9D;
    }

    .pagination .page-link:hover {
        background-color: #457B9D;
        color: white;
        transform: translateY(-2px);
    }

    /* Line clamp utility */
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

    .line-clamp-4 {
        display: -webkit-box;
        -webkit-line-clamp: 4;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>
@endsection
