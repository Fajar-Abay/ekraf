@extends("layouts.admin")

@section("judul", "Artikel")

@section("main")
<!-- Font Awesome -->
<div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @for ($i = 0; $i < 21; $i++)
            <div class="bg-white rounded-2xl shadow-md overflow-hidden relative hover:shadow-lg transition">
                <!-- Gambar -->
                <img src="{{ asset('image/bg.jpg') }}" alt="Artikel Ekonomi Kreatif"
                    class="w-full h-48 object-cover rounded-t-2xl">

                <!-- Konten -->
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800">Artikel Ekonomi Kreatif</h3>
                    <p class="text-sm text-gray-600 mt-1">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros facilisis.
                    </p>

                    <div class="flex items-center gap-2 mt-3 text-sm text-gray-700">
                        <i class="fa-solid fa-calendar-days text-blue-600"></i>
                        <span>Senin, 20 Oktober 2025</span>
                    </div>
                </div>

                <!-- Tombol Aksi -->
                <div class="absolute bottom-3 right-3 flex gap-2">
                    <button
                        class="bg-[#7598A3] text-white p-3 rounded-full shadow-md hover:bg-[#57757e] transition"
                        title="Edit">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </button>

                    <button
                        class="bg-[#7598A3] text-white p-3 rounded-full shadow-md hover:bg-[#57757e] transition"
                        title="Hapus">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
        @endfor
    </div>
</div>


@endsection
