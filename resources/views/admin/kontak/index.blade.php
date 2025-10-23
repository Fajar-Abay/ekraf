@extends("layouts.admin")

@section("judul", "Kontak")

@section("main")
    <!-- Hero Section -->
    <div class="relative w-full h-[60vh] flex items-center justify-center bg-cover bg-center bg-no-repeat"
        style="background-image: linear-gradient(rgba(255,255,255,0.4), rgba(255,255,255,0.4)), url('{{ asset('image/bg.jpg') }}');">
        <h1 class="text-4xl md:text-6xl font-bold text-[#073B4C] text-center drop-shadow-lg">
            Daftar Kontak
        </h1>
    </div>

    <div class="w-full bg-white flex flex-col items-center py-16 text-[#073B4C]">
        <h2 class="text-3xl font-bold mb-10">Kontak Kami</h2>

        <!-- Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 w-[90%] md:w-[70%]">
            <!-- Alamat -->
            <div class="bg-[#6b8b99] text-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition">
                <i class="fas fa-map-marker-alt text-3xl mb-3"></i>
                <h3 class="font-semibold mb-2">Alamat</h3>
                <p class="text-sm">
                    {{ $kontak->alamat ?? 'Alamat belum diatur.' }}
                </p>
            </div>

            <!-- Email -->
            <div class="bg-[#6b8b99] text-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition">
                <i class="fas fa-envelope text-3xl mb-3"></i>
                <h3 class="font-semibold mb-1">Email</h3>
                <p class="text-sm">{{ $kontak->email ?? 'Email belum diatur.' }}</p>
            </div>

            <!-- Mobile -->
            <div class="bg-[#6b8b99] text-white rounded-2xl shadow-md p-6 flex flex-col items-center text-center hover:shadow-lg transition">
                <i class="fas fa-taxi text-3xl mb-3"></i>
                <h3 class="font-semibold mb-1">Mobile</h3>
                <p class="text-sm leading-relaxed">
                    @if($kontak)
                        ({{ $kontak->telepon1 ?? '-' }})<br>
                        ({{ $kontak->telepon2 ?? '-' }})<br>
                        ({{ $kontak->telepon3 ?? '-' }})
                    @else
                        Tidak ada nomor telepon
                    @endif
                </p>
            </div>
        </div>
    </div>

    {{-- Maps --}}
    <div class="w-full max-w-4xl my-8 flex justify-center items-center h-80 rounded-xl overflow-hidden shadow-lg mx-auto">
        @php
            $alamatDefault = 'Jl. Prabu Geusan Ulun No.36, Regol Wetan, Sumedang Selatan, Kabupaten Sumedang, Jawa Barat 45311';
        @endphp

        <iframe
            src="https://www.google.com/maps?q={{ urlencode($kontak->alamat ?? $alamatDefault) }}&output=embed"
            width="100%"
            height="100%"
            style="border:0;"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>

    {{-- Tombol Aksi --}}
    <div class="flex justify-center space-y-8 space-x-4 mt-4">
        <!-- Tombol Edit -->
        <a href="{{ route('admin.kontak.edit', $kontak->id ?? 1) }}"
           class="bg-[#004b5c] text-white px-4 py-2 rounded-lg shadow-md hover:bg-[#036b82] transition">
            <i class="fas fa-pen mr-2"></i>Edit
        </a>

        <!-- Tombol Hapus -->
        <form action="{{ route('admin.kontak.destroy', $kontak->id ?? 1) }}" method="POST"
              onsubmit="return confirm('Yakin mau hapus data kontak ini?')">
            @csrf
            @method('DELETE')
            <button type="submit"
                class="bg-[#004b5c] text-white px-4 py-2 rounded-lg shadow-md hover:bg-[#036b82] transition">
                <i class="fas fa-trash mr-2"></i>Hapus
            </button>
        </form>
    </div>
@endsection
