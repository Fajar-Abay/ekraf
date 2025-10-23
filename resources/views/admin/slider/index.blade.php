@extends('layouts.admin')

@section('main')
<div x-data="{ openModal: false }" class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Kelola Slider</h1>
        <button @click="openModal = true"
            class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow">
            + Tambah Slider
        </button>
    </div>

    {{-- Table Slider --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="min-w-full text-sm text-left text-gray-700">
            <thead class="bg-gray-100 text-gray-600 uppercase">
                <tr>
                    <th class="px-4 py-2">#</th>
                    <th class="px-4 py-2">Judul</th>
                    <th class="px-4 py-2">Gambar</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sliders as $slider)
                <tr class="border-t hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2">{{ $slider->judul ?? '-' }}</td>
                    <td class="px-4 py-2">
                        <img src="{{ asset('storage/'.$slider->gambar) }}" class="h-12 rounded-md">
                    </td>
                    <td class="px-4 py-2">
                        @if($slider->is_active)
                            <span class="bg-green-100 text-green-700 px-2 py-1 text-xs rounded">Aktif</span>
                        @else
                            <span class="bg-red-100 text-red-700 px-2 py-1 text-xs rounded">Nonaktif</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 text-center space-x-2">
                        {{-- Tombol Toggle Status --}}
                        <form action="{{ route('admin.slider.toggle', $slider->id) }}" method="POST" class="inline">
                            @csrf
                            @method('PATCH')
                            @if($slider->is_active)
                                <button type="submit"
                                    class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                    Nonaktifkan
                                </button>
                            @else
                                <button type="submit"
                                    class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                    Aktifkan
                                </button>
                            @endif
                        </form>

                        {{-- Tombol Hapus --}}
                        <form action="{{ route('admin.slider.destroy', $slider->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Yakin hapus slider ini?')"
                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">Belum ada slider.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{-- Modal Tambah --}}
    <div x-show="openModal" x-transition class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div @click.outside="openModal = false"
             class="bg-white rounded-2xl p-6 w-full max-w-md shadow-lg">
            <h2 class="text-xl font-semibold mb-4">Tambah Slider</h2>

            <form action="{{ route('admin.slider.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
                    <input type="text" name="judul" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Judul slider...">
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="deskripsi" class="w-full border-gray-300 rounded-lg shadow-sm" placeholder="Deskripsi singkat..."></textarea>
                </div>
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
                    <input type="file" name="gambar" class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="openModal = false" class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Batal</button>
                    <button type="submit" class="px-4 py-2 rounded bg-blue-600 hover:bg-blue-700 text-white">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
