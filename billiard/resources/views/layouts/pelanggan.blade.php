<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Kelola Meja')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-slate-900 text-white">
    @include('components.header-pelanggan')

    <div class="flex pt-16">
        @yield('sidebar')

        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>

    @include('components.footer-pelanggan')
</body>
</html>
