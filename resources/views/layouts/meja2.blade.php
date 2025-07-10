<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Forcue')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@2.3.0/dist/flowbite.min.js"></script>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #C6CED5;
            color: #1a202c;
        }
    </style>
</head>
<body class="min-h-screen bg-[#D7E6F4] flex flex-col">
    @include('components.header-meja2')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer-meja2')
    @stack('scripts')
</body>
</html>
