@extends('layouts.admin')

@section('main')
<div class="p-6">
    <h1 class="text-2xl font-bold text-gray-700 mb-6">Edit Data Kontak</h1>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.kontak.update', $kontak->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-gray-600 font-medium">Alamat</label>
            <textarea name="alamat" rows="3" class="w-full p-3 border rounded-lg focus:ring focus:ring-teal-300">{{ old('alamat', $kontak->alamat) }}</textarea>
            @error('alamat') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-600 font-medium">Email</label>
            <input type="email" name="email" value="{{ old('email', $kontak->email) }}" class="w-full p-3 border rounded-lg focus:ring focus:ring-teal-300">
            @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        <div>
            <label class="block text-gray-600 font-medium">Telepon 1</label>
            <input type="text" name="telepon1" value="{{ old('telepon1', $kontak->telepon1) }}" class="w-full p-3 border rounded-lg focus:ring focus:ring-teal-300">
        </div>

        <div>
            <label class="block text-gray-600 font-medium">Telepon 2</label>
            <input type="text" name="telepon2" value="{{ old('telepon2', $kontak->telepon2) }}" class="w-full p-3 border rounded-lg focus:ring focus:ring-teal-300">
        </div>

        <div>
            <label class="block text-gray-600 font-medium">Telepon 3</label>
            <input type="text" name="telepon3" value="{{ old('telepon3', $kontak->telepon3) }}" class="w-full p-3 border rounded-lg focus:ring focus:ring-teal-300">
        </div>

        <div class="flex justify-between items-center mt-6">
            <a href="{{ route('admin.kontak.index') }}" class="px-4 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>

            <button type="button"
                    @click="confirmOpen = true"
                    class="bg-[#004b5c] text-white px-4 py-2 rounded-lg shadow-md hover:bg-[#036b82] transition">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>

        {{-- Modal Konfirmasi --}}
        <div x-data="{ confirmOpen: false }">
            <div x-show="confirmOpen"
                 class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded-xl shadow-lg w-96 text-center">
                    <h2 class="text-xl font-semibold mb-4">Konfirmasi Update</h2>
                    <p class="text-gray-600 mb-6">Apakah kamu yakin ingin menyimpan perubahan ini?</p>
                    <div class="flex justify-center gap-4">
                        <button type="submit"
                                class="bg-[#004b5c] text-white px-4 py-2 rounded-lg hover:bg-[#036b82]">
                            Ya, Simpan
                        </button>
                        <button type="button"
                                @click="confirmOpen = false"
                                class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
