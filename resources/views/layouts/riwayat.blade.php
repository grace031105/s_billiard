<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://unpkg.com/flowbite@1.6.5/dist/flowbite.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body class="min-h-screen bg-[#D7E6F4] flex flex-col">

  @include('components.header-riwayat')

  <main class="container mx-auto px-4 py-6 flex-grow">
    @yield('content')
  </main>

  @include('components.footer-riwayat')
  @stack('scripts')

</body>
</html>
