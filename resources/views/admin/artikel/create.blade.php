@extends('layouts.admin')

@section('judul', 'Tambah Artikel')

@section('main')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h2 class="text-2xl font-bold mb-4 text-[#004b5c]">Tambah Artikel</h2>

    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700">Judul</label>
            <input type="text" name="judul" class="w-full border rounded-lg p-2" required>
        </div>

        <div>
            <label class="block text-gray-700">Isi</label>
            <textarea name="isi" rows="5" class="w-full border rounded-lg p-2" required></textarea>
        </div>

        <div>
            <label class="block text-gray-700">Gambar</label>
            <input type="file" name="gambar" class="w-full border rounded-lg p-2">
        </div>

        <div>
            <label class="block text-gray-700">Tanggal</label>
            <input type="date" name="tanggal" class="w-full border rounded-lg p-2">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
            Simpan
        </button>
    </form>
</div>
@endsection
