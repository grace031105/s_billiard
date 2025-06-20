<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>@yield('title') | Billiard</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen flex flex-col bg-cover bg-center" style="background-image: url('{{ asset('images/gambar1.jpg') }}');">
  
  {{-- Header --}}
  @include('components.header-register')

  {{-- Konten Utama --}}
  <main class="flex-grow flex items-center justify-center py-12">
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('components.footer-register')

  {{-- Script tambahan dari halaman --}}
  @yield('scripts')

</body>
</html>
