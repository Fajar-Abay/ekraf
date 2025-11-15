@extends("layouts.admin")

@section("judul", "Artikel")

@section("main")
<div class="container mx-auto px-4 py-8">

    <!-- Tombol Tambah Artikel -->
    <div class="flex justify-end mb-6">
        <a href="{{ route('admin.artikel.create') }}"
           class="bg-[#004b5c] text-white px-4 py-2 rounded-lg shadow-md hover:bg-[#036b82] transition">
           <i class="fa-solid fa-plus mr-2"></i> Tambah Artikel
        </a>
    </div>

    <!-- Grid Artikel -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @forelse ($artikels as $artikel)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden relative hover:shadow-lg transition">
                <!-- Gambar -->
                <img src="{{ $artikel->gambar
                            ? asset('storage/' . $artikel->gambar)
                            : asset('image/bg.jpg')
                        }}"
                    alt="{{ $artikel->judul }}"
                    class="w-full h-48 object-cover rounded-t-2xl">

                <!-- Konten -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">{{ $artikel->judul }}</h3>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-3">
                        {{ Str::limit($artikel->isi, 100) }}
                    </p>

                    <div class="flex items-center gap-2 mt-3 text-sm text-gray-700">
                        <i class="fa-solid fa-calendar-days text-blue-600"></i>
                        <span>
                            {{ $artikel->created_at
                                ? \Carbon\Carbon::parse($artikel->created_at)->translatedFormat('l, d F Y')
                                : 'Tanggal tidak tersedia' }}
                        </span>
                    </div>
                </div>

                <!-- Tombol Aksi dengan Alpine.js -->
                <div
                    x-data="{ open: false }"
                    class="absolute bottom-3 right-3 flex flex-col items-center space-y-2"
                >
                    <!-- Tombol Edit -->
                    <a
                        x-show="open"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 translate-y-3"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-3"
                        href="{{ route('admin.artikel.edit', $artikel->id) }}"
                        class="bg-[#7598A3] text-white p-3 rounded-full shadow-md hover:bg-[#57757e] transform hover:scale-110"
                        title="Edit"
                    >
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>

                    <!-- Tombol Hapus -->
                    <form
                        x-show="open"
                        x-transition:enter="transition ease-out duration-300 delay-150"
                        x-transition:enter-start="opacity-0 translate-y-3"
                        x-transition:enter-end="opacity-100 translate-y-0"
                        x-transition:leave="transition ease-in duration-200"
                        x-transition:leave-start="opacity-100 translate-y-0"
                        x-transition:leave-end="opacity-0 translate-y-3"
                        action="{{ route('admin.artikel.destroy', $artikel->id) }}"
                        method="POST"
                        onsubmit="return confirm('Yakin ingin menghapus artikel ini?')"
                    >
                        @csrf
                        @method('DELETE')
                        <button
                            type="submit"
                            class="bg-red-600 text-white p-3 rounded-full shadow-md hover:bg-red-700 transform hover:scale-110"
                            title="Hapus"
                        >
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>

                    <!-- Tombol Toggle -->
                    <button
                        @click="open = !open"
                        class="bg-[#004b5c] text-white p-3 rounded-full shadow-md hover:bg-[#036b82] transition transform hover:scale-110"
                        title="Aksi"
                    >
                        <i class="fa-solid fa-plus text-sm"
                           :class="open ? 'rotate-45 transition-transform' : 'transition-transform'"></i>
                    </button>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500 col-span-3">Belum ada artikel yang ditambahkan.</p>
        @endforelse
    </div>

    <!-- Pagination -->
    @if ($artikels->hasPages())
        <div class="mt-8 flex justify-center">
            {{ $artikels->links('pagination::tailwind') }}
        </div>
    @endif

</div>
@endsection
