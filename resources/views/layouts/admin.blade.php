<!DOCTYPE html>
<html lang="id" x-data="{ openSidebar: false }" x-cloak>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Admin Panel')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Header -->
    <header class=" lg:hidden w-full bg-[#004E64] text-white flex items-center justify-between px-4 py-3 shadow-md">
        <h1 class="font-semibold text-lg">@yield('judul', 'Admin Panel')</h1>

        <!-- Tombol Hamburger (muncul hanya di mobile) -->
        <button
            @click="openSidebar = !openSidebar"
            class="lg:hidden bg-[#007F8C] hover:bg-[#0096A0] p-2 rounded-md transition-all duration-300"
        >
            <div class="relative w-6 h-6">
                <!-- Ikon Hamburger -->
                <i class="fa-solid fa-bars absolute inset-0 text-xl transform transition-all duration-300"
                   :class="openSidebar ? 'opacity-0 scale-50 rotate-45' : 'opacity-100 scale-100 rotate-0'"></i>

                <!-- Ikon X -->
                <i class="fa-solid fa-xmark absolute inset-0 text-xl transform transition-all duration-300"
                   :class="openSidebar ? 'opacity-100 scale-100 rotate-0' : 'opacity-0 scale-50 -rotate-45'"></i>
            </div>
        </button>
    </header>

    <!-- Overlay (gelap transparan di belakang sidebar) -->
    <div x-show="openSidebar"
         @click="openSidebar = false"
         class="fixed inset-0 z-40 lg:hidden"
         x-transition.opacity>
    </div>

    <!-- Konten Utama -->
    <div class="flex flex-1 w-full">
        <!-- Sidebar -->
        <x-sidebar-admin />

        <!-- Isi Halaman -->
        <main class="flex-1 overflow-y-auto">
            @yield('main')
        </main>
    </div>

    @stack("scripts")

</body>
</html>
