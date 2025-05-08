<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Kelola Meja')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-blue-900 text-white min-h-screen">
    @include('components.header-meja')

    <div class="flex pt-16">
        <!-- Sidebar -->
        <aside class="w-64 bg-blue-300 min-h-screen p-4">
            <ul class="space-y-4">
                <li><a href="#" class="block text-slate-900 font-semibold hover:underline">Beranda</a></li>
                <hr>
                <li><a href="#" class="block text-slate-900 hover:underline">Data Reservasi</a></li>
                <hr>
                <li><a href="#" class="block text-slate-900 hover:underline">Kelola Meja</a></li>
                <hr>
                <li><a href="#" class="block text-slate-900 hover:underline">Pelanggan</a></li>
                <hr>
            </ul>
        </aside>

        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>

    @include('components.footer-meja')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
</body>
</html>
