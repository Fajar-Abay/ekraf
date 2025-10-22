@extends('layouts.admin')

@section("judul", "Tentang")

@section('main')
    <!-- Hero Section -->
    <div class="relative w-full h-[60vh] flex items-center justify-center bg-cover bg-center bg-no-repeat"
        style="background-image: linear-gradient(rgba(255,255,255,0.4), rgba(255,255,255,0.4)), url('{{ asset('image/bg.jpg') }}');">
        <h1 class="text-4xl md:text-6xl font-bold text-[#073B4C] text-center drop-shadow-lg">
            Tentang <br> Ekonomi Kreatif
        </h1>
    </div>

    <!-- Konten visi -->
    <div class="relative z-10 bg-white border rounded-full shadow-2xl p-6 mx-6 md:mx-20 -mt-16">
        <p class="text-[#073B4C] text-center leading-relaxed">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus euismod, libero eget tincidunt aliquam,
            turpis justo interdum tortor, nec vulputate odio sapien eget elit. Vivamus id nisl ac lectus facilisis
            pulvinar. Integer euismod urna vel lacus convallis, in volutpat metus posuere.
        </p>
    </div>

    {{-- konten misi --}}
   <div class=" bg-[#073B4C] border rounded-full shadow-lg p-8 mx-6 md:mx-20 my-10">
        <p class="text-white text-center leading-relaxed">
           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros facilisis, at ultricies nisi auctor. Integer ut sodales enim, nec commodo libero. In vel vehicula nisi.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros facilisis, at ultricies nisi auctor. Integer ut sodales enim, nec commodo libero. In vel vehicula nisi.
        </p>
    </div>

    <div class="flex justify-center container mx-auto py-10 px-6">
        <img src="{{ asset('image/bg.jpg') }}"
            alt="Gambar"
            class=" object-cover rounded-[70px] w-full h-[350px] border shadow-md p-2 bg-white">
    </div>

    {{-- gatau --}}
    <div class="container mx-auto py-10 px-6">
        <div class="flex flex-col md:flex-row items-center md:items-start ">
            <!-- Kolom kiri (dua gambar) -->
            <div class="flex flex-col gap-6 w-full md:w-1/2">
                <img src="{{ asset('image/bg.jpg') }}"
                    alt="Gambar 1"
                    class="object-cover rounded-[40px] w-[400px] h-[200px] border shadow-md p-2 bg-white">
                <img src="{{ asset('image/bg.jpg') }}"
                    alt="Gambar 2"
                    class="object-cover rounded-[40px] w-[400px] h-[200px] border shadow-md p-2 bg-white">
            </div>

            <!-- Kolom kanan (teks) -->
            <div class="w-full py-10 border rounded-[40px] shadow-2xl/30 p-8 md:w-1/2">
                <h2 class="text-2xl font-semibold text-[#004E64] mb-4">Tentang Program</h2>
                <p class="text-gray-700 leading-relaxed">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis non velit eligendi,
                    officia facere ea fuga quidem saepe repellat tenetur sapiente quos maiores quas perspiciatis
                    voluptate tempora omnis aut autem!
                </p>
                <p class="text-gray-700 leading-relaxed mt-4">
                    Dignissimos architecto, omnis quae ea nisi provident cupiditate inventore voluptas accusantium,
                    ipsum deleniti. Hic, qui nulla? Nulla dolorem totam veritatis repellat maxime repudiandae,
                    ipsum deleniti inventore porro dolorum. Nobis, harum!
                </p>
            </div>
        </div>


    {{-- penjelasan --}}
    </div>

       <div class=" bg-[#073B4C] border rounded-[50px] shadow-lg p-8 mx-6 md:mx-20 my-10">
        <p class="text-white text-center leading-relaxed">
           Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros facilisis, at ultricies nisi auctor. Integer ut sodales enim, nec commodo libero. In vel vehicula nisi.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros facilisis, at ultricies nisi auctor. Integer ut sodales enim, nec commodo libero. In vel vehicula nisi.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros facilisis, at ultricies nisi auctor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas sollicitudin purus vitae eros
        </p>
    </div>

    <div class="mx-[70px] flex gap-3 pb-6">
        <a href="#"
            class="flex items-center gap-2 bg-[#6F97A4] text-white px-3 py-1.5 rounded-lg hover:bg-[#3D6977] transition duration-200 shadow-sm">
            <i class="fa-solid fa-pen-to-square"></i>
            Edit
        </a>

        <a href="#"
            class="flex items-center gap-2 bg-[#6F97A4] text-white px-3 py-1.5 rounded-lg hover:bg-[#3D6977] transition duration-200 shadow-sm">
            <i class="fa-solid fa-trash"></i>
            Hapus
        </a>
    </div>

@endsection
