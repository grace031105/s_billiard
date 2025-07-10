<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title', 'FORCUE - Reservasi Billiard')</title>

  <!-- Flowbite CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- AOS Animation -->
  <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet" />

  <style>
    @keyframes fadeInLeft {
      from { opacity: 0; transform: translateX(-50px); }
      to { opacity: 1; transform: translateX(0); }
    }
    .animate-fadeInLeft {
      animation: fadeInLeft 1s ease-out forwards;
    }

    /* Slider Styles */
    .slider-container { max-width: 80%; margin: 0 auto; padding: 0 1rem; }
    .slider-track { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 2rem; }
    .slider-item { flex: 0 0 auto; width: 270px; border-radius: 12px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); background-color: #1f2937; overflow: hidden; transition: transform 0.3s ease; }
    .slider-item:hover { transform: translateY(-5px); }
    .slider-item img { width: 100%; height: 200px; object-fit: cover; }
  </style>
</head>
<body class="bg-slate-200 font-sans text-slate-800 overflow-x-hidden">

  {{-- Navbar --}}
  @include('components.header-dashboard')

  {{-- Main Content --}}
  <main class="min-h-screen">
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('components.footer-dashboard')
    @stack('scripts')


  <!-- Flowbite JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

  <!-- AOS JS -->
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,
      duration: 800,
      offset: 100
    });
  </script>

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
