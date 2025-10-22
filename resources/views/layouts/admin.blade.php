<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('judul', 'Admin Panel')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">


</head>
<body class="flex bg-gray-100">

    <div class="flex w-full">
        <x-sidebar-admin />

        <!-- Konten Utama -->
        <main class="flex-1 overflow-y-auto">
            @yield('main')
        </main>
    </div>

</body>
</html>
