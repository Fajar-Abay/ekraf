<!DOCTYPE html>
<html lang="id" x-data="{ openSidebar: false }" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Petugas')</title>

     @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
          integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-gray-100 font-[Poppins] text-gray-800 flex min-h-screen">

    <!-- Sidebar -->
    <aside
        class="fixed inset-y-0 left-0 z-50 w-64 bg-[#003846] text-white transform transition-transform duration-300 ease-in-out
            lg:translate-x-0 lg:static lg:z-auto"
        :class="openSidebar ? 'translate-x-0' : '-translate-x-full lg:translate-x-0'"
        x-cloak
    >
        <div class="p-5 flex flex-col h-full">
            <div class="flex items-center gap-3 mb-6">
                <img src="{{ asset('images/logo.png') }}" class="w-12 h-auto" alt="Logo">
                <h1 class="font-bold leading-tight text-lg">EKONOMI KREATIF<br>SUMEDANG</h1>
            </div>
            <hr class="border-white/30 mb-6">

            <nav class="flex-1 space-y-3">
                <a href="{{ route('petugas.artikel.index') }}"
                    class="flex items-center gap-3 py-2 px-4 rounded-md transition-all duration-200
                    hover:bg-white/20 hover:translate-x-1
                    {{ request()->routeIs('petugas.artikel.*') ? 'bg-white/25' : '' }}">
                    <i class="fa-solid fa-newspaper"></i> Artikel
                </a>

                <a href="{{ url('database.index') }}"
                    class="flex items-center gap-3 py-2 px-4 rounded-md transition-all duration-200
                    hover:bg-white/20 hover:translate-x-1
                    {{ request()->routeIs('database.index') ? 'bg-white/25' : '' }}">
                    <i class="fa-solid fa-database"></i> Database
                </a>

                <a href="#"
                    class="flex items-center gap-3 py-2 px-4 rounded-md hover:bg-white/20 transition-all duration-200">
                    <i class="fa-solid fa-right-from-bracket"></i> Logout
                </a>
            </nav>

            <div class="mt-auto text-center text-xs text-gray-300 pt-4 border-t border-white/20">
                &copy; {{ date('Y') }} Ekonomi Kreatif Sumedang
            </div>
        </div>
    </aside>


    <!-- Overlay (mobile only) -->
    <div
        class="fixed inset-0 bg-black/50 z-40 transition-opacity duration-300 lg:hidden"
        x-show="openSidebar"
        @click="openSidebar = false"
        x-transition.opacity
        x-cloak>
    </div>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen transition-all duration-300">

        <!-- Header -->
        <header class="flex items-center justify-between bg-white shadow-md px-5 py-3 sticky top-0 z-30">
            <div class="flex items-center gap-3">
                <!-- Tombol hamburger -->
                <button
                    @click="openSidebar = !openSidebar"
                    class="lg:hidden bg-[#004E64] text-white p-2 rounded-md shadow-md focus:outline-none hover:bg-[#007F8C] transition-all duration-300">
                    <div class="relative w-6 h-6">
                        <i class="fa-solid fa-bars absolute inset-0 text-lg transform transition-all duration-300"
                           :class="openSidebar ? 'opacity-0 scale-50 rotate-45' : 'opacity-100 scale-100 rotate-0'"></i>
                        <i class="fa-solid fa-xmark absolute inset-0 text-lg transform transition-all duration-300"
                           :class="openSidebar ? 'opacity-100 scale-100 rotate-0' : 'opacity-0 scale-50 -rotate-45'"></i>
                    </div>
                </button>

                <h1 class="font-bold text-lg text-[#003846]">@yield('title', 'Dashboard Petugas')</h1>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">Halo, Petugas</span>
                <i class="fa-solid fa-user-circle text-2xl text-[#004E64]"></i>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

</body>
</html>
