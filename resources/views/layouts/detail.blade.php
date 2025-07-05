<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'Forcue')</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background-color: #9EB0C2;
            color: #1a202c;
        }
    </style>
</head>
<body class="bg-gray-300 font-sans">
    @include('components.header-detail')

    <main class="p-10 max-w-5xl mx-auto">
        @yield('content')
    </main>

    @include('components.footer-detail')
    <script>
           document.addEventListener('DOMContentLoaded', () => {
    const openCart = document.getElementById('openCart');
    const closeCart = document.getElementById('closeCart');
    const schedulePanel = document.getElementById('schedulePanel');
    const overlay = document.getElementById('overlay');

    if (openCart && closeCart && schedulePanel && overlay) {
      openCart.addEventListener('click', () => {
        schedulePanel.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
      });

      closeCart.addEventListener('click', () => {
        schedulePanel.classList.add('translate-x-full');
        overlay.classList.add('hidden');
      });

      overlay.addEventListener('click', () => {
        schedulePanel.classList.add('translate-x-full');
        overlay.classList.add('hidden');
      });
    }
        </script>
</body>
</html>
