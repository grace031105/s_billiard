<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Forcue</title>
    @vite('resources/css/app.css') {{-- ← Ini penting --}}
</head>

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.1/dist/tailwind.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<body class="bg-gray-100">
   <form action="{{ route('cari.meja') }}" method="GET" class="flex">
    <input type="text" name="query" placeholder="Cari Meja..." 
        class="rounded-l-full px-4 py-2 focus:outline-none" required>
    <button type="submit" class="bg-blue-600 text-white px-4 rounded-r-full">
        <i class="fas fa-search"></i>
    </button>
</form>

    @yield('content')

</body>
</html>
