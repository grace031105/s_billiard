@php 
  use Illuminate\Support\Facades\Auth;
@endphp

<!-- Navbar -->
<header class="bg-[#1E293B] text-white py-4 px-6 flex items-center justify-between">
  <!-- Logo -->
  <div class="flex items-center gap-4">
    <img src="images/gambar3.png" alt="Logo Forcue" class="h-10">
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
    <a href="{{ route('dash-public') }}"
   class="relative font-semibold uppercase text-base px-2 py-1 text-white
          before:absolute before:bottom-0 before:left-0 before:h-0.5 before:w-0
          before:bg-blue-500 before:transition-all before:duration-300
          hover:before:w-full">
   Beranda
</a>
<a href="{{ route('dash-public') }}#tentang"
   class="relative font-semibold uppercase text-base px-2 py-1 text-white
          before:absolute before:bottom-0 before:left-0 before:h-0.5 before:w-0
          before:bg-blue-500 before:transition-all before:duration-300
          hover:before:w-full">
   Tentang
</a>
<a href="{{ route('dash-public') }}#lokasi"
   class="relative font-semibold uppercase text-base px-2 py-1 text-white
          before:absolute before:bottom-0 before:left-0 before:h-0.5 before:w-0
          before:bg-blue-500 before:transition-all before:duration-300
          hover:before:w-full">
   Lokasi
</a>
<a href="{{ route('dash-public') }}#footer"
   class="relative font-semibold uppercase text-base px-2 py-1 text-white
          before:absolute before:bottom-0 before:left-0 before:h-0.5 before:w-0
          before:bg-blue-500 before:transition-all before:duration-300
          hover:before:w-full">
   Kontak Kami
</a>
  </nav>

  <div class="flex items-center space-x-4">
    <!-- Keranjang -->
    <button id="openCart" onclick="toggleSchedulePopup()" class="text-white hover:text-gray-300">
  <i class="fa-solid fa-cart-shopping text-xl"></i>
</button>
@guest('pelanggan')
    <!-- Tombol Masuk (hanya jika BELUM login) -->
    <a href="{{ route('login') }}" class="flex items-center gap-2 px-4 py-1.5 rounded-full border-2 border-[#9EB0C2] bg-[#3A5A75] text-white font-semibold text-sm shadow hover:bg-[#51728E] transition duration-300">
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
         class="absolute right-0 mt-2 w-40 bg-white text-black rounded shadow-lg hidden z-50">
        <div class="px-4 py-2 text-sm font-semibold border-b border-gray-200">
            {{ Auth::guard('pelanggan')->user()->nama_pengguna }}
        </div>
        <a href="{{ route('profil.show') }}" class="block px-4 py-2 hover:bg-gray-100">Profil</a>
        <a href="{{ route('riwayat_penyewaan') }}" class="block px-4 py-2 hover:bg-gray-100">Riwayat Penyewaan</a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-2 hover:bg-gray-100">Keluar</button>
        </form>
    </div>
</div>
@endguest


</header>
<!-- Popup Jadwal -->
<div id="schedulePopup" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-white p-6 w-96 rounded-lg shadow-lg">
    <h2 class="text-xl font-bold mb-4">Pilih Jadwal</h2>
    <!-- Konten jadwal bisa ditambahkan di sini -->
    <button onclick="closeSchedulePopup()" class="mt-4 px-6 py-2 bg-red-500 text-white rounded">Tutup</button>
  </div>
</div>

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
