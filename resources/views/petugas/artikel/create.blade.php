@extends('layouts.petugas')

@section('title', 'Tambah Artikel')

@section('content')
<div class="min-h-screen flex flex-col items-center">

    <!-- Header -->
    <div class="relative w-full h-72 bg-cover bg-center flex flex-col justify-center items-center text-center text-white"
         style="background-image: url('{{ asset('image/bg.jpg') }}');">
        <div class="absolute inset-0 bg-black/40"></div>
        <h2 class="relative text-3xl lg:text-5xl font-bold tracking-wide">
            Tambah Artikel <br> Ekonomi Kreatif
        </h2>
    </div>

    <!-- Form -->
    <div class="relative bg-white w-full max-w-3xl mt-[-60px] rounded-2xl shadow-lg p-8 z-10">
        <h5 class="text-center text-xl font-bold text-[#003846] mb-6">Form Tambah Artikel</h5>

        <form action="{{ route('petugas.artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <input type="text" name="judul" placeholder="Judul Artikel" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004E64] outline-none">
                </div>
                <div>
                    <input type="text" name="penulis" placeholder="Nama Penulis" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004E64] outline-none">
                </div>
                <div>
                    <input type="text" name="kategori" placeholder="Kategori" required
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004E64] outline-none">
                </div>
                <div>
                    <input type="file" name="gambar" accept="image/*"
                           class="w-full border border-gray-300 rounded-lg px-3 py-2 bg-gray-50 focus:ring-2 focus:ring-[#004E64] outline-none">
                </div>
            </div>

            <div>
                <textarea name="isi" rows="5" placeholder="Isi Artikel" required
                          class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004E64] outline-none"></textarea>
            </div>

            <div>
                <input type="text" name="sumber" placeholder="Sumber (opsional)"
                       class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-[#004E64] outline-none">
            </div>

            <div class="flex justify-center mt-5 space-x-3">
                <button type="submit"
                        class="bg-[#26547c] hover:bg-[#1f4567] text-white px-6 py-2 rounded-lg transition-all duration-300">
                    Simpan
                </button>
                <a href="{{ route('petugas.artikel.index') }}"
                   class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-2 rounded-lg transition-all duration-300">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
