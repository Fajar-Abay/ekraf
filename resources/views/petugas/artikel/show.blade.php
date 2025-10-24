@extends('layouts.petugas')

@section('title', $artikel->judul)

@section('content')
<div class="min-h-screen bg-white text-gray-800">

    <!-- Header Artikel -->
    <section class="relative w-full h-72 flex flex-col justify-center items-center bg-center bg-cover"
             style="background-image: url('{{ $artikel->gambar ? asset('storage/' . $artikel->gambar) : asset('image/bg.jpg') }}')">
        <div class="absolute inset-0 bg-black/50"></div>
        <h1 class="relative text-3xl lg:text-5xl font-bold text-white text-center px-3">
            {{ $artikel->judul }}
        </h1>
        <p class="relative text-gray-200 text-sm mt-3">
            {{ $artikel->created_at->translatedFormat('l, d F Y') }}
        </p>
    </section>

    <!-- Isi Artikel -->
    <div class="max-w-4xl mx-auto px-6 py-10">
        <div class="flex items-center gap-3 mb-8 text-gray-600">
            <i class="fa-chisel fa-regular fa-circle-user"></i>
            <div>
                <p class="font-semibold text-[#004E64]">Ekonomi Kreatif Sumedang</p>
                <p class="text-sm">{{ $artikel->created_at->translatedFormat('l, d F Y') }}</p>
            </div>
        </div>

        @if($artikel->gambar)
            <img src="{{ asset('storage/' . $artikel->gambar)}}"
                 alt="{{ $artikel->judul }}"
                 class="rounded-lg shadow-md mb-5 w-full">
            <p class="text-sm text-gray-500 italic mb-6">Keterangan Foto</p>
        @endif

        <article class="prose max-w-none text-justify leading-relaxed">
            {!! nl2br(e($artikel->isi)) !!}
        </article>
    </div>

    <!-- Artikel Lainnya -->
    @if($lainnya->count() > 0)
    <div class="border-t border-gray-200 mt-12 pt-10">
        <h3 class="text-center text-2xl font-bold text-[#003846] mb-6">Artikel Lainnya</h3>

        <div class="flex flex-wrap justify-center gap-6 px-6">
            @foreach($lainnya as $a)
                <a href="{{ route('petugas.artikel.show', $a->id) }}"
                   class="block w-60 bg-white border border-gray-200 rounded-xl shadow hover:shadow-lg transition-all duration-300 hover:-translate-y-1 overflow-hidden">
                    <img src="{{ $a->gambar ? asset('storage/' . $artikel->gambar) : asset('image/bg.jpg') }}"
                         alt="{{ $a->judul }}" class="w-full h-36 object-cover">
                    <div class="p-3">
                        <h6 class="font-semibold text-[#003846] text-sm mb-1 line-clamp-2">{{ $a->judul }}</h6>
                        <p class="text-xs text-gray-600 line-clamp-3">{{ \Illuminate\Support\Str::limit(strip_tags($a->isi), 100) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection
