@extends("layouts.admin")

@section("judul", "Subsektor")

@section("main")
<div
    x-data="{
        openAdd: false,
        openEdit: false,
        editData: { id: '', nama: '', ikon: '' },
        openDelete: false,
        deleteId: null
    }"
    class="relative"
>
    <!-- Hero Section -->
    <div class="relative w-full h-[60vh] flex items-center justify-center bg-cover bg-center bg-no-repeat"
        style="background-image: linear-gradient(rgba(255,255,255,0.4), rgba(255,255,255,0.4)), url('{{ asset('image/bg.jpg') }}');">
        <h1 class="text-4xl md:text-6xl font-bold text-[#073B4C] text-center drop-shadow-lg">
            Subsektor <br> Ekonomi Kreatif
        </h1>
    </div>

    <!-- Tombol Tambah -->
    <div class="flex justify-end items-center my-6 pr-6">
        <button @click="openAdd = true"
           class="flex items-center gap-2 bg-[#004b5c] text-white px-5 py-2.5 rounded-full shadow-lg hover:bg-[#036b82] hover:scale-105 transition">
            <span class="font-medium">Tambah</span>
            <i class="fas fa-plus text-lg"></i>
        </button>
    </div>

    <!-- Grid Subsektor -->
    <div class="relative z-20 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 p-6 mb-32">
        @forelse ($subsektors as $subsektor)
            <div
                x-data="{ open: false }"
                class="relative flex flex-col items-center justify-center bg-[#e6f0f5] rounded-full w-40 h-40 mx-auto shadow-md transition hover:shadow-lg cursor-pointer"
                @click="window.location.href='{{ route('admin.subsektor.detail', $subsektor->id) }}'"
            >
                <!-- Ikon dan Nama -->
                <div class="flex flex-col items-center justify-center w-full h-full rounded-full hover:bg-[#d7e8ef] transition">
                    <div class="text-4xl mb-2 text-gray-700">
                        <i class="{{ $subsektor->ikon ?? 'fas fa-briefcase' }}"></i>
                    </div>
                    <span class="text-sm font-semibold text-gray-700 text-center">
                        {{ $subsektor->nama }}
                    </span>
                </div>

                <!-- Tombol Aksi -->
                <button
                    @click.stop="open = !open"
                    class="absolute bottom-2 right-2 bg-[#004b5c] text-white p-2 rounded-full hover:bg-[#036b82] transition transform hover:scale-110 z-30"
                >
                    <i class="fas fa-plus text-xs"
                       :class="open ? 'rotate-45 transition-transform' : 'transition-transform'"></i>
                </button>

                <!-- Menu Edit & Hapus -->
                <div class="absolute -mr-3 flex flex-col items-center space-y-3 bottom-[-70px] right-4 z-30">
                    <!-- Edit -->
                    <button
                        x-show="open"
                        @click.stop="
                            openEdit = true;
                            editData.id = '{{ $subsektor->id }}';
                            editData.nama = '{{ $subsektor->nama }}';
                            editData.ikon = '{{ $subsektor->ikon }}';
                        "
                        x-transition
                        class="bg-[#004b5c] text-white p-2 rounded-full shadow-md hover:bg-[#036b82] transform hover:scale-110"
                    >
                        <i class="fas fa-pen"></i>
                    </button>

                    <!-- Hapus -->
                    <button
                        x-show="open"
                        @click.stop="openDelete = true; deleteId = '{{ $subsektor->id }}';"
                        x-transition
                        class="bg-[#004b5c] text-white p-2 rounded-full shadow-md hover:bg-red-600 transform hover:scale-110"
                    >
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 col-span-full">Belum ada subsektor.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    @if ($subsektors->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $subsektors->links('pagination::tailwind') }}
        </div>
    @endif

    <!-- Modal Tambah -->
    <div x-show="openAdd"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-transition>
        <div class="bg-white p-6 rounded-xl w-[90%] md:w-[400px] shadow-lg">
            <h2 class="text-xl font-bold mb-4 text-[#004b5c]">Tambah Subsektor</h2>
            <form method="POST" action="{{ route('admin.subsektor.store') }}">
                @csrf
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Nama Subsektor</label>
                    <input type="text" name="nama" class="w-full p-2 border-gray-300 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Ikon (Font Awesome)</label>
                    <input type="text" name="ikon" placeholder="contoh: fas fa-film" class="w-full p-2 border-gray-300 rounded-lg">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="openAdd = false"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-[#004b5c] text-white rounded-lg hover:bg-[#036b82]">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div x-show="openEdit"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-transition>
        <div class="bg-white p-6 rounded-xl w-[90%] md:w-[400px] shadow-lg">
            <h2 class="text-xl font-bold mb-4 text-[#004b5c]">Edit Subsektor</h2>
            <form :action="`/admin/subsektor/${editData.id}`" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label class="block text-sm font-medium text-gray-700">Nama Subsektor</label>
                    <input type="text" name="nama" x-model="editData.nama" class="w-full border-gray-300 p-2 rounded-lg" required>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Ikon (Font Awesome)</label>
                    <input type="text" name="ikon" x-model="editData.ikon" class="w-full border-gray-300 p-2 rounded-lg">
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button" @click="openEdit = false"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-[#004b5c] text-white rounded-lg hover:bg-[#036b82]">Update</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Hapus -->
    <div x-show="openDelete"
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"
        x-transition>
        <div class="bg-white p-6 rounded-xl w-[90%] md:w-[400px] shadow-lg text-center">
            <h2 class="text-xl font-semibold mb-4 text-gray-800">Yakin ingin menghapus?</h2>
            <form :action="`/admin/subsektor/${deleteId}`" method="POST">
                @csrf
                @method('DELETE')
                <div class="flex justify-center gap-3">
                    <button type="button" @click="openDelete = false"
                        class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Batal</button>
                    <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">Hapus</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
