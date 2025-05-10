<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Forcue')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #9EB0C2;
            color: #1a202c;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    @include('components.header-meja1')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer-meja1')
    @stack('scripts')
</body>
</html>
