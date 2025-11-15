@extends('layouts.app')

@section('title', $artikel->judul . ' - Ekonomi Kreatif Sumedang')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-8" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ url('/') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-[#073B4C]">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                    </svg>
                    Beranda
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <a href="{{ route('user.artikel') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-[#073B4C] md:ml-2">Artikel</a>
                </div>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 truncate max-w-xs">{{ $artikel->judul }}</span>
                </div>
            </li>
        </ol>
    </nav>

    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Konten Utama -->
        <div class="lg:w-2/3">
            <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
                <!-- Gambar Utama -->
                <div class="h-64 md:h-80 lg:h-96 w-full overflow-hidden">
                    <img
                        src="{{ $artikel->gambar ? asset('storage/'.$artikel->gambar) : asset('images/bg.jpg') }}"
                        alt="{{ $artikel->judul }}"
                        class="w-full h-full object-cover"
                    />
                </div>

                <!-- Konten Artikel -->
                <div class="p-6 md:p-8">
                    <!-- Header -->
                    <header class="mb-6">
                        <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-[#073B4C] mb-4 leading-tight">
                            {{ $artikel->judul }}
                        </h1>

                        <!-- Meta Information -->
                        <div class="flex flex-wrap items-center gap-4 text-sm text-gray-600 mb-4">
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                                </svg>
                                <span>Oleh: {{ $artikel->penulis }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $artikel->created_at->translatedFormat('d F Y') }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                                </svg>
                                <span>{{ $artikel->created_at->diffForHumans() }}</span>
                            </div>
                        </div>

                        <!-- Tags/Kategori -->
                        <div class="flex flex-wrap gap-2">
                            <span class="px-3 py-1 bg-[#457B9D] text-white text-xs font-medium rounded-full">
                                Ekonomi Kreatif
                            </span>
                            <span class="px-3 py-1 bg-[#118AB2] text-white text-xs font-medium rounded-full">
                                Sumedang
                            </span>
                        </div>
                    </header>

                    <!-- Konten Isi -->
                    <div class="prose max-w-none prose-lg">
                        <div class="text-gray-700 leading-relaxed text-justify">
                            {!! $artikel->isi !!}
                        </div>
                    </div>

                    <!-- Share Buttons -->
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <span class="text-sm font-medium text-gray-600">Bagikan artikel:</span>
                            <div class="flex gap-3">
                                <!-- Facebook -->
                                <a href="#" class="w-10 h-10 bg-blue-600 text-white rounded-full flex items-center justify-center hover:bg-blue-700 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </a>
                                <!-- Twitter -->
                                <a href="#" class="w-10 h-10 bg-blue-400 text-white rounded-full flex items-center justify-center hover:bg-blue-500 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                                <!-- LinkedIn -->
                                <a href="#" class="w-10 h-10 bg-blue-800 text-white rounded-full flex items-center justify-center hover:bg-blue-900 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <!-- WhatsApp -->
                                <a href="#" class="w-10 h-10 bg-green-500 text-white rounded-full flex items-center justify-center hover:bg-green-600 transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893-.001-3.189-1.262-6.189-3.553-8.443"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <!-- Artikel Terbaru -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6 sticky top-6">
                <h3 class="text-xl font-bold text-[#073B4C] mb-4">Artikel Terbaru</h3>
                <form action="{{ route('user.artikel.show', $artikel->id) }}" method="GET">
                    <div>
                        <input
                            type="text"
                            name="search"
                            placeholder="Cari artikel..."
                            value="{{ request('search') }}"
                            class="w-full border border-gray-300 rounded-full px-4 py-2 focus:outline-none focus:ring-2 focus:ring-[#118AB2] focus:border-transparent"
                        /> 
                    </div>
                </form>
                <div class="space-y-4">
                    @foreach($artikelTerbaru as $terbaru)
                    <a href="{{ route('user.artikel.show', $terbaru->id) }}" class="block group">
                        <div class="flex gap-3 hover:bg-gray-50 p-2 rounded-lg transition-colors">
                            <div class="flex-shrink-0 w-16 h-16 rounded-lg overflow-hidden">
                                <img
                                    src="{{ $terbaru->gambar ? asset('storage/'.$terbaru->gambar) : asset('images/bg.jpg') }}"
                                    alt="{{ $terbaru->judul }}"
                                    class="w-full h-full object-cover"
                                />
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="text-sm font-semibold text-[#073B4C] group-hover:text-[#457B9D] line-clamp-2 mb-1">
                                    {{ $terbaru->judul }}
                                </h4>
                                <p class="text-xs text-gray-500">{{ $terbaru->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Styles untuk prose content -->
<style>
.prose {
    color: #374151;
    line-height: 1.75;
}

.prose h2 {
    color: #073B4C;
    font-weight: 700;
    font-size: 1.5em;
    margin-top: 2em;
    margin-bottom: 1em;
}

.prose h3 {
    color: #073B4C;
    font-weight: 600;
    font-size: 1.25em;
    margin-top: 1.6em;
    margin-bottom: 0.6em;
}

.prose p {
    margin-bottom: 1.25em;
}

.prose ul, .prose ol {
    margin-bottom: 1.25em;
    padding-left: 1.625em;
}

.prose li {
    margin-bottom: 0.5em;
}

.prose blockquote {
    font-weight: 500;
    font-style: italic;
    color: #073B4C;
    border-left-width: 0.25rem;
    border-left-color: #457B9D;
    quotes: "\201C""\201D""\2018""\2019";
    margin-top: 1.6em;
    margin-bottom: 1.6em;
    padding-left: 1em;
}

.prose a {
    color: #457B9D;
    text-decoration: underline;
    font-weight: 500;
}

.prose a:hover {
    color: #073B4C;
}
</style>
@endsection
