<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Forcue')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
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
    @include('components.header-riwayat')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer-reservasi')
    @stack('scripts')
</body>
</html>
 <!-- Dropdown & Keranjang Logic -->
  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const userBtn = document.getElementById('userBtn');
      const userDropdown = document.getElementById('userDropdown');
      const openCart = document.getElementById('openCart');
      const closeCart = document.getElementById('closeCart');
      const schedulePanel = document.getElementById('schedulePanel');
      const overlay = document.getElementById('overlay');

      userBtn?.addEventListener('click', () => {
        userDropdown?.classList.toggle('hidden');
      });

      openCart?.addEventListener('click', () => {
        schedulePanel?.classList.remove('translate-x-full');
        overlay?.classList.remove('hidden');
      });

      closeCart?.addEventListener('click', () => {
        schedulePanel?.classList.add('translate-x-full');
        overlay?.classList.add('hidden');
      });

      overlay?.addEventListener('click', () => {
        schedulePanel?.classList.add('translate-x-full');
        overlay?.classList.add('hidden');
      });
    });
  </script>

</body>
</html>

