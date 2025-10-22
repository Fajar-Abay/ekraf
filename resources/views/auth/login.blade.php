<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css'])

    <style>
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(15px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.8s ease-out forwards;
        }
    </style>
</head>
<body class="bg-cover bg-center min-h-screen flex items-center justify-center"
      style="background-image: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{ asset('image/bg.jpg') }}'); background-repeat: no-repeat;">

    <div class="bg-[#1A6279] bg-opacity-90 p-10 space-y-4 rounded-2xl shadow-2xl w-110 text-center fade-in">
        <h2 class="text-3xl font-bold text-white mb-2">Login</h2>
        <p class="text-white text-sm mb-8">Silahkan masukkan Email dan Password anda</p>
        @if (session('error'))
            <p class="text-red-300 text-sm mt-4">{{ session('error') }}</p>
        @endif

        @if (session('success'))
            <p class="text-green-300 text-sm mt-4">{{ session('success') }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST" class="space-y-4">
            @csrf
            <input type="email" name="email" placeholder="Masukkan Email..." required
                class="w-full px-4 py-3 my-4 p-6 bg-white rounded-md border-none focus:ring-2 focus:ring-teal-300 outline-none text-gray-800">

            <input type="password" name="password" placeholder="Masukkan Password..." required
                class="w-full px-4 py-3 my-4 p-6 bg-white rounded-md border-none focus:ring-2 focus:ring-teal-300 outline-none text-gray-800">

            <button type="submit"
                class="w-full bg-[#073B4C] text-white font-semibold py-4 rounded-md hover:bg-teal-700 transition-all">
                Login
            </button>
        </form>


    </div>

</body>
</html>
