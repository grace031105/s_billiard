<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FORCUE - Reservasi Billiard</title>

  <!-- Flowbite CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


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
    .slider-track { display: flex; justify-content: space-between; }
    .slider-item { flex: 0 0 auto; width: 270px; margin: 0 1.25rem; border-radius: 12px; box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); background-color: #1f2937; overflow: hidden; transition: transform 0.3s ease; }
    .slider-item:hover { transform: translateY(-5px); }
    .slider-item img { width: 100%; height: 200px; object-fit: cover; }
  </style>
</head>
<body class="bg-slate-200 bg-[#C6CED5] font-sans text-slate-800">
    
    @include('components.header-dashboard_public')

    @yield('content')

    @include('components.footer-dashboard_public')
    @stack('scripts')
<script>
    document.getElementById('userBtn').addEventListener('click', () => {
    document.getElementById('userDropdown').classList.toggle('hidden');
  });
  document.addEventListener('DOMContentLoaded', () => {
    const openCart = document.getElementById('openCart');
    const closeCart = document.getElementById('closeCart');
    const schedulePanel = document.getElementById('schedulePanel');
    const overlay = document.getElementById('overlay');

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
  });
    </script>
</body>
</html>
