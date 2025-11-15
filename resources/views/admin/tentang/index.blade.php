@extends('layouts.admin')

@section('judul', 'Tentang')

@section('main')
<div x-data="{ openModal: false }">
    <!-- Hero Section -->
    <div class="relative w-full h-[40vh] md:h-[60vh] flex items-center justify-center bg-cover bg-center bg-no-repeat"
        style="background-image: linear-gradient(rgba(255,255,255,0.4), rgba(255,255,255,0.4)), url({{ asset('image/bg.jpg') }})">
        <h1 class="text-3xl md:text-6xl font-bold text-[#073B4C] text-center drop-shadow-lg px-4">
            Tentang <br> {{ $tentang->judul ?? 'Ekonomi Kreatif' }}
        </h1>
    </div>

    <!-- Konten visi -->
    <div class="relative z-10 bg-white border rounded-3xl shadow-2xl p-4 md:p-6 mx-4 md:mx-20 -mt-10 md:-mt-16">
        <p class="text-[#073B4C] text-center leading-relaxed text-sm md:text-base">
            {{ $tentang->visi ?? 'Visi belum tersedia.' }}
        </p>
    </div>

    {{-- Konten misi --}}
    <div class="bg-[#073B4C] border rounded-3xl shadow-lg p-6 md:p-8 mx-4 md:mx-20 my-8 md:my-10">
        <p class="text-white text-center leading-relaxed text-sm md:text-base">
            {{ $tentang->misi ?? 'Misi belum tersedia.' }}
        </p>
    </div>

    {{-- Gambar tambahan --}}
    <div class="flex justify-center container mx-auto py-6 md:py-10 px-4 md:px-6">
        <img src="{{ asset($tentang->gambar1 ? 'storage/'.$tentang->gambar1 : 'image/bg.jpg') }}"
            alt="Gambar 1"
            class="object-cover rounded-3xl w-full md:w-3/4 h-[220px] md:h-[350px] border shadow-md p-2 bg-white">
    </div>

    {{-- Program --}}
    <div class="container mx-auto py-8 md:py-10 px-4 md:px-6">
        <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
            <div class="flex flex-col gap-4 w-full md:w-1/2">
                <img src="{{ asset($tentang->gambar2 ? 'storage/'.$tentang->gambar2 : 'image/bg.jpg') }}"
                    alt="Gambar 2"
                    class="object-cover rounded-2xl w-full h-[200px] border shadow-md p-2 bg-white">
                <img src="{{ asset($tentang->gambar3 ? 'storage/'.$tentang->gambar3 : 'image/bg.jpg') }}"
                    alt="Gambar 3"
                    class="object-cover rounded-2xl w-full h-[200px] border shadow-md p-2 bg-white">
            </div>

            <div class="w-full border rounded-2xl shadow-2xl/30 p-6 md:p-8 md:w-1/2">
                <h2 class="text-xl md:text-2xl font-semibold text-[#004E64] mb-3">Tentang Program</h2>
                <p class="text-gray-700 leading-relaxed text-sm md:text-base">
                    {{ $tentang->program ?? 'Belum ada deskripsi program.' }}
                </p>
            </div>
        </div>
    </div>

    {{-- Penjelasan --}}
    <div class="bg-[#073B4C] border rounded-3xl shadow-lg p-6 md:p-8 mx-4 md:mx-20 my-8 md:my-10">
        <p class="text-white text-center leading-relaxed text-sm md:text-base">
            {{ $tentang->penjelasan ?? 'Belum ada penjelasan tambahan.' }}
        </p>
    </div>

    {{-- Tombol Aksi --}}
    <div class="mx-4 md:mx-[70px] flex justify-center md:justify-start gap-3 pb-6">
        <button
            @click="openModal = true"
            class="flex items-center gap-2 bg-[#6F97A4] text-white px-4 py-2 rounded-lg hover:bg-[#3D6977] transition duration-200 shadow-sm text-sm md:text-base">
            <i class="fa-solid fa-pen-to-square"></i>
            Edit
        </button>
    </div>

   {{-- Modal Edit --}}
<div
    x-show="openModal"
    x-transition
    class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 px-2 sm:px-4"
    x-cloak
>
    <div
        @click.away="openModal = false"
        class="bg-white rounded-2xl shadow-2xl w-full max-w-sm sm:max-w-md md:max-w-2xl p-4 sm:p-6 relative overflow-y-auto max-h-[90vh]"
    >
        <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-[#073B4C] mb-4 text-center md:text-left">
            Edit Tentang
        </h2>

        <form
            action="{{ route('admin.tentang.update', $tentang->id ?? 1) }}"
            method="POST"
            enctype="multipart/form-data"
            class="space-y-4"
        >
            @csrf
            @method('PUT')

            {{-- Grid untuk input kecil --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Judul --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Judul</label>
                    <input
                        type="text"
                        name="judul"
                        value="{{ $tentang->judul ?? '' }}"
                        class="w-full border rounded-lg p-2 mt-1 text-sm focus:ring focus:ring-blue-200"
                    >
                </div>

                {{-- Gambar 1 --}}
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gambar 1</label>
                    <input
                        type="file"
                        name="gambar1"
                        class="w-full border rounded-lg p-2 mt-1 text-sm"
                    >
                    @if ($tentang->gambar1)
                        <img
                            src="{{ asset('storage/'.$tentang->gambar1) }}"
                            class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg mt-2 border mx-auto md:mx-0"
                        >
                    @endif
                </div>
            </div>

            {{-- Grid gambar tambahan --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gambar 2</label>
                    <input
                        type="file"
                        name="gambar2"
                        class="w-full border rounded-lg p-2 mt-1 text-sm"
                    >
                    @if ($tentang->gambar2)
                        <img
                            src="{{ asset('storage/'.$tentang->gambar2) }}"
                            class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg mt-2 border mx-auto md:mx-0"
                        >
                    @endif
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gambar 3</label>
                    <input
                        type="file"
                        name="gambar3"
                        class="w-full border rounded-lg p-2 mt-1 text-sm"
                    >
                    @if ($tentang->gambar3)
                        <img
                            src="{{ asset('storage/'.$tentang->gambar3) }}"
                            class="w-16 h-16 sm:w-20 sm:h-20 object-cover rounded-lg mt-2 border mx-auto md:mx-0"
                        >
                    @endif
                </div>
            </div>

            {{-- Visi --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Visi</label>
                <textarea
                    name="visi"
                    rows="2"
                    class="w-full border rounded-lg p-2 mt-1 text-sm focus:ring focus:ring-blue-200"
                >{{ $tentang->visi ?? '' }}</textarea>
            </div>

            {{-- Misi --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Misi</label>
                <textarea
                    name="misi"
                    rows="2"
                    class="w-full border rounded-lg p-2 mt-1 text-sm focus:ring focus:ring-blue-200"
                >{{ $tentang->misi ?? '' }}</textarea>
            </div>

            {{-- Program --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Program</label>
                <textarea
                    name="program"
                    rows="3"
                    class="w-full border rounded-lg p-2 mt-1 text-sm focus:ring focus:ring-blue-200"
                >{{ $tentang->program ?? '' }}</textarea>
            </div>

            {{-- Penjelasan --}}
            <div>
                <label class="block text-sm font-medium text-gray-700">Penjelasan</label>
                <textarea
                    name="penjelasan"
                    rows="3"
                    class="w-full border rounded-lg p-2 mt-1 text-sm focus:ring focus:ring-blue-200"
                >{{ $tentang->penjelasan ?? '' }}</textarea>
            </div>

            {{-- Tombol --}}
            <div class="flex flex-col sm:flex-row justify-end gap-3 pt-2">
                <button
                    type="button"
                    @click="openModal = false"
                    class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 transition text-sm w-full sm:w-auto"
                >
                    Batal
                </button>
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition text-sm w-full sm:w-auto"
                >
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
