@php 
  use Illuminate\Support\Facades\Auth;
@endphp

<!-- Navbar -->
<header class="bg-[#1E293B] text-white py-4 px-6 flex items-center justify-between">
  <!-- Logo -->
  <div class="flex items-center gap-4">
    <img src="{{ asset('images/gambar3.png') }}" alt="Logo Forcue" class="h-10" />
  </div>

  <!-- Search Bar -->
  <div class="flex-1 max-w-md mx-6 hidden md:block">
    <form action="{{ route('cari.meja') }}" method="GET">
    <div class="relative">
      <input type="text" name="query" placeholder="Cari meja billiard..."
        class="w-full rounded-full py-2 pl-4 pr-10 bg-[#3A5A75] text-white placeholder-gray-300 border border-[#9EB0C2] focus:outline-none focus:ring-2 focus:ring-blue-500"
        value="{{ request('query') }}">
      <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-white"></i>
    </div>
</form>
  </div>

  <!-- Navigation Links -->
  <nav class="hidden md:flex gap-6 text-sm font-medium">
    <a href="{{ route('dash') }}"
   class="relative font-semibold uppercase text-base px-2 py-1 text-white
          before:absolute before:bottom-0 before:left-0 before:h-0.5 before:w-0
          before:bg-blue-500 before:transition-all before:duration-300
          hover:before:w-full">
   Beranda
</a>
<a href="{{ route('dash') }}#tentang"
   class="relative font-semibold uppercase text-base px-2 py-1 text-white
          before:absolute before:bottom-0 before:left-0 before:h-0.5 before:w-0
          before:bg-blue-500 before:transition-all before:duration-300
          hover:before:w-full">
   Tentang
</a>
<a href="{{ route('dash') }}#lokasi"
   class="relative font-semibold uppercase text-base px-2 py-1 text-white
          before:absolute before:bottom-0 before:left-0 before:h-0.5 before:w-0
          before:bg-blue-500 before:transition-all before:duration-300
          hover:before:w-full">
   Lokasi
</a>
<a href="{{ route('dash') }}#footer"
   class="relative font-semibold uppercase text-base px-2 py-1 text-white
          before:absolute before:bottom-0 before:left-0 before:h-0.5 before:w-0
          before:bg-blue-500 before:transition-all before:duration-300
          hover:before:w-full">
   Kontak Kami
</a>
  </nav>

  <!-- Right Actions -->
  <div class="flex items-center space-x-4">
    <!-- Keranjang -->
    <button id="openCart" onclick="toggleKeranjang()" class="text-white hover:text-gray-300"
      class="relative flex items-center justify-center w-10 h-10 rounded-full bg-white text-blue-900 hover:bg-blue-100 transition duration-200 shadow-md">
  <i class="fa-solid fa-cart-shopping text-lg"></i>
    </button>
@guest('pelanggan')
    <!-- Tombol Masuk (hanya jika BELUM login) -->
    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
        Masuk
    </a>
@else
    <!-- Profil Dropdown -->
<div class="relative inline-block text-left">
  <!-- Tombol ikon user Font Awesome -->
  <button onclick="toggleDropdown()" id="userBtn" class="text-white text-xl p-2 rounded-full hover:bg-gray-700">
    <i class="fa fa-user"></i>
  </button>
<div id="dropdownMenu"
     class="absolute right-0 mt-2 w-60 bg-[#1E3A5F] text-white rounded shadow-lg hidden z-50 overflow-hidden">

    <!-- Header: Selamat Datang -->
    <div class="px-4 py-2 text-sm font-bold bg-[#325D88] text-white text-center">
        Selamat datang di Forcue, <span class="uppercase">{{ Auth::guard('pelanggan')->user()->nama_pengguna }}</span>! 
    </div>

    <!-- Menu: Profil -->
    <a href="{{ route('profil.show') }}" class="flex items-center px-4 py-2 hover:bg-[#27496D] text-sm transition">
        <i class="fa fa-user mr-2 text-white"></i> Profil
    </a>

    <!-- Menu: Riwayat Penyewaan -->
    <a href="{{ route('riwayat_penyewaan') }}" class="flex items-center px-4 py-2 hover:bg-[#27496D] text-sm transition">
        <i class="fa fa-history mr-2 text-white"></i> Riwayat Penyewaan
    </a>

    <!-- Menu: Logout -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
                class="flex items-center w-full px-4 py-2 hover:bg-[#27496D] text-sm text-left transition text-white">
            <i class="fa fa-sign-out-alt mr-2 text-red-400"></i> Keluar
        </button>
    </form>
</div>
@endguest


</header>

<script>
  function toggleDropdown() {
    const dropdown = document.getElementById('dropdownMenu');
    dropdown.classList.toggle('hidden');
  }

  // Tutup jika klik di luar
  document.addEventListener('click', function (event) {
    const dropdown = document.getElementById('dropdownMenu');
    const btn = document.getElementById('userBtn');
    if (dropdown && btn && !dropdown.contains(event.target) && !btn.contains(event.target)) {
      dropdown.classList.add('hidden');
    }
  function toggleSchedulePopup() {
    document.getElementById('schedulePopup').classList.remove('hidden');
  }

  function closeSchedulePopup() {
    document.getElementById('schedulePopup').classList.add('hidden');
  }
 });
</script>
