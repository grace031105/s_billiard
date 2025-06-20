@php 
  use Illuminate\Support\Facades\Auth;
@endphp

<!-- Navbar -->
<header class="bg-[#1D2939] text-white py-4 px-6 flex items-center justify-between">
  <!-- Logo -->
  <div class="flex items-center gap-4">
    <img src="images/gambar3.png" alt="Logo Forcue" class="h-10">
  </div>

  <!-- Search Bar -->
  <div class="flex-1 max-w-md mx-6 hidden md:block">
    <div class="relative">
      <input type="text" placeholder="Cari meja billiard..."
        class="w-full rounded-full py-2 pl-4 pr-10 bg-[#3A5A75] text-white placeholder-gray-300 border border-[#9EB0C2] focus:outline-none focus:ring-2 focus:ring-blue-500">
      <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-white"></i>
    </div>
  </div>

  <!-- Navigation Links -->
  <nav class="hidden md:flex gap-6 text-sm font-medium">
    <a href="dash" class="hover:text-lime-400">Beranda</a>
    <a href="dash" class="hover:text-lime-400">Tentang</a>
    <a href="dash" class="hover:text-lime-400">Lokasi</a>
    <a href="dash" class="hover:text-lime-400">Kontak</a>
  </nav>

  <!-- Right Actions -->
  <div class="flex items-center space-x-4">
    <!-- Keranjang -->
    <button id="openCart" onclick="toggleSchedulePopup()" class="text-white hover:text-gray-300">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 19M17 13l1.6 6M6 21h12" />
      </svg>
    </button>
@guest('pelanggan')
    <!-- Tombol Masuk (hanya jika BELUM login) -->
    <a href="{{ route('login') }}" class="bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
        Masuk
    </a>
@else
    <!-- Profil Dropdown -->
    <div class="relative inline-block">
    <button id="userBtn" onclick="toggleDropdown()" class="focus:outline-none">
        <img src="{{ asset('uploads/' . (Auth::guard('pelanggan')->user()->foto ?? '/images/default.jpeg')) }}"
             alt="Profil" class="w-10 h-10 rounded-full object-cover border border-white">
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
