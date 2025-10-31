@extends('layouts.app')

@section('title', 'Artikel - Ekonomi Kreatif Sumedang')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h1 class="text-3xl md:text-4xl font-bold text-[#073B4C] text-center mb-12">Artikel Ekonomi Kreatif</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($berita as $artikel)
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 flex flex-col">
                
                <!-- Gambar / fallback -->
                <div class="h-48 w-full overflow-hidden">
                    <img 
                        src="{{ $artikel->gambar ? asset('storage/'.$artikel->gambar) : asset('images/bg.jpg') }}" 
                        alt="{{ $artikel->judul }}" 
                        class="w-full h-full object-cover"
                    />
                </div>

                <!-- Konten artikel -->
                <div class="p-6 flex flex-col flex-1">
                    <h2 class="text-[#073B4C] font-bold text-xl mb-2">{{ $artikel->judul }}</h2>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-4">
                        {{ Str::limit(strip_tags($artikel->isi), 150) }}
                    </p>

                    <!-- Meta -->
                    <div class="text-xs text-gray-500 mb-4">
                        <span>Penulis: {{ $artikel->penulis }}</span> | 
                        <span>{{ $artikel->created_at->format('d M Y') }}</span>
                    </div>

                    <!-- Tombol baca selengkapnya -->
                    <a href="{{ url('berita.show', $artikel->id) }}" 
                       class="mt-auto inline-block text-center bg-[#457B9D] hover:bg-[#356E85] text-white font-medium px-6 py-2 rounded-full transition-all duration-300">
                        Baca Selengkapnya
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination jika ada -->
    <div class="mt-12 flex justify-center">
        {{ $berita->links() }}
    </div>
</div>
@endsection
