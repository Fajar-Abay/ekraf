<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- FONT & ICON -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Animasi rotasi ikon dropdown */
        .rotate-icon {
            transition: transform 0.3s ease;
        }
        .rotate-active {
            transform: rotate(180deg);
        }

        /* Efek transisi navbar */
        .navbar {
            background-color: rgb(7, 59, 76);
            transition: background-color 0.4s ease, backdrop-filter 0.4s ease;
        }
        .navbar-scrolled {
            background-color: rgba(7, 59, 76, 0.8);
            backdrop-filter: blur(6px);
        }

        /* Footer dengan efek blur background */
        footer::before {
            content: "";
            position: absolute;
            inset: 0;
            background: url('{{ asset('images/footer_bg.jpg') }}') center/cover no-repeat;
            background-attachment: fixed;
            filter: blur(6px);
            transform: scale(1.05);
            z-index: 0;
        }
        footer .overlay {
            position: absolute;
            inset: 0;
            background: rgba(255, 255, 255, 0.65);
            z-index: 1;
        }
        footer .content {
            position: relative;
            z-index: 2;
        }
    </style>
</head>

<body class="font-[Poppins] bg-gray-50">

    <!-- ===== NAVBAR ===== -->
    <nav id="navbar" class="navbar fixed top-0 w-full z-50 py-3 shadow-md">
        <div class="container mx-auto px-4 flex flex-wrap items-center justify-between">

            <!-- Logo & Judul -->

            <a href="{{ url('/') }}" class="flex items-center space-x-4">
                <div class="flex flex-col items-center text-white text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-11 h-auto mb-1">

                    <!-- Teks kecil di bawah logo, lebih kecil dan rapih -->
                    <span class="text-[5px] sm:text-[5px] font-medium leading-tight mt-0 text-white/80">
                        DESAIN PARIWISATA, KEBUDAYAAN<br>
                        KEPEMUDAAN, DAN OLAHRAGA<br>
                        S U M E D A N G
                    </span>
                </div>

                <div class="leading-tight text-left">
                    <h1 class="text-white font-extrabold text-xl sm:text-xl">
                        EKONOMI KREATIF<br>S U M E D A N G
                    </h1>
                </div>
            </a>

            <!-- Tombol Menu Mobile -->
            <button class="lg:hidden text-white focus:outline-none" id="menuBtn">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                     viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                     d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>

            <!-- Menu Navigasi -->
            <div id="menuNav" class="hidden w-full lg:flex lg:w-auto lg:items-center">
                <ul class="flex flex-col lg:flex-row lg:space-x-6 text-white text-sm font-medium mt-3 lg:mt-0">

                    <li>
                        <a href="{{ url('/') }}"
                           class="pb-1 {{ request()->is('/')
                               ? 'text-yellow-400 underline decoration-yellow-400 decoration-2 underline-offset-4'
                               : 'hover:text-yellow-400 hover:underline decoration-yellow-400 decoration-2 underline-offset-4' }}">
                            Beranda
                        </a>
                    </li>

                    <li><a href="tentang" class="pb-1 hover:text-yellow-400 hover:underline decoration-yellow-400 decoration-2 underline-offset-4">Tentang</a></li>
                    <li><a href="{{ route('user.artikel') }}" class="pb-1 hover:text-yellow-400 hover:underline decoration-yellow-400 decoration-2 underline-offset-4">Artikel</a></li>
                    <li><a href="/user/sektor" class="pb-1 hover:text-yellow-400 hover:underline decoration-yellow-400 decoration-2 underline-offset-4">Subsektor</a></li>
                    <li><a href="/kontak" class="pb-1 hover:text-yellow-400 hover:underline decoration-yellow-400 decoration-2 underline-offset-4">Kontak</a></li>

                    <!-- Dropdown Pendataan -->
                    <li class="relative pb-1">
                        <button id="dropdownBtn"
                            class="flex items-center space-x-1 text-white hover:text-yellow-400 hover:underline decoration-yellow-400 decoration-2 underline-offset-4 focus:outline-none">
                            <span>Pendataan</span>
                            <svg id="dropdownIcon" xmlns="http://www.w3.org/2000/svg"
                                 class="h-4 w-4 mt-0.5 rotate-icon" fill="none"
                                 viewBox="0 0 24 24" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                 d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <ul id="dropdownMenu" class="hidden bg-white text-gray-700 mt-2 rounded-md shadow-md w-40 z-10 absolute">

                            <li><a href="{{ route('user.database') }}" class="block px-4 py-2 hover:bg-yellow-100">Database</a></li>
                            <li><a href="{{ route('user.pendataan') }}" class="block px-4 py-2 hover:bg-yellow-100">Pendaftaran</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- Spacer agar konten tidak tertutup navbar -->
    <div class="h-20"></div>

    <!-- ===== KONTEN HALAMAN ===== -->
    <main class="min-h-screen">
        @yield('content')
    </main>
    <!-- ===== FOOTER ===== -->
    <footer class="relative py-16 overflow-hidden bg-gradient-to-r from-[#073B4C] to-[#0A4D68] text-white">

        <div class="relative z-10 max-w-6xl mx-auto px-6 md:px-20 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">

            <!-- Kolom Kiri: Kontak -->
            <div class=" p-6 rounded-2xl">
                <h2 class="text-2xl font-bold mb-3">Ekonomi Kreatif Sumedang</h2>
                <p class="font-medium mb-4">Dinas Pariwisata, Kebudayaan, Kepemudaan, dan Olahraga Sumedang</p>

                <ul class="space-y-3 text-sm md:text-base">
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-location-dot text-yellow-400 mt-1"></i>
                        <span><strong>Alamat:</strong> {{ $kontak->alamat ?? '-' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-envelope text-yellow-400 mt-1"></i>
                        <span><strong>Email:</strong> {{ $kontak->email ?? '-' }}</span>
                    </li>
                    <li class="flex items-start gap-3">
                        <i class="fa-solid fa-phone text-yellow-400 mt-1"></i>
                        <span>
                            {{ $kontak->telepon1 ?? '-' }}<br>
                            {{ $kontak->telepon2 ?? '' }}<br>
                            {{ $kontak->telepon3 ?? '' }}
                        </span>
                    </li>
                </ul>
            </div>

            <!-- Kolom Kanan: Menu -->
            <div class="p-6 rounded-2xl ">
                <h3 class="text-xl font-semibold mb-4">Menu</h3>
                <ul class="space-y-2 text-sm md:text-base">
                    <li><a href="beranda" class="hover:text-yellow-400 transition">Beranda</a></li>
                    <li><a href="tentang" class="hover:text-yellow-400 transition">Tentang</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition">Artikel</a></li>
                    <li><a href="#" class="hover:text-yellow-400 transition">Subsektor</a></li>
                    <li><a href="kontak" class="hover:text-yellow-400 transition">Kontak</a></li>
                </ul>
            </div>

        </div>

        <!-- Sosial Media -->
        <div class="relative z-10 mt-12 flex justify-center space-x-6">
            <a href="https://facebook.com" target="_blank" class="text-white hover:text-blue-500 transition text-2xl"><i class="fab fa-facebook"></i></a>
            <a href="https://instagram.com" target="_blank" class="text-white hover:text-pink-500 transition text-2xl"><i class="fab fa-instagram"></i></a>
            <a href="https://x.com" target="_blank" class="text-white hover:text-black transition text-2xl"><i class="fab fa-x-twitter"></i></a>
            <a href="https://linkedin.com" target="_blank" class="text-white hover:text-blue-700 transition text-2xl"><i class="fab fa-linkedin"></i></a>
        </div>

    </footer>



    <!-- ===== SCRIPT ===== -->
    <script>
        // Toggle menu mobile
        document.getElementById('menuBtn').addEventListener('click', function () {
            document.getElementById('menuNav').classList.toggle('hidden');
        });

        // Dropdown animasi panah
        const dropdownBtn = document.getElementById('dropdownBtn');
        const dropdownIcon = document.getElementById('dropdownIcon');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownBtn.addEventListener('click', function () {
            dropdownMenu.classList.toggle('hidden');
            dropdownIcon.classList.toggle('rotate-active');
        });

        // Efek transparansi navbar saat scroll
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('navbar-scrolled');
            } else {
                navbar.classList.remove('navbar-scrolled');
            }
        });
    </script>
</body>
</html>
