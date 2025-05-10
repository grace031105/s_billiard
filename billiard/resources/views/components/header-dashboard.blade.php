<nav class="flex items-center justify-between px-6 py-4 bg-slate-900 text-white">
  <a href="#"><img src="/images/gambar3.png" alt="Logo Forcue" class="h-10" /></a>
  <div class="flex items-center space-x-6">
    <input type="text" placeholder="Cari..." class="rounded px-3 py-1 text-sm text-black" />
    <a href="#" class="font-bold">BERANDA</a>
    <a href="#tentang" class="font-bold">TENTANG</a>
    <a href="#lokasi" class="font-bold">LOKASI</a>
    <a href="#kontak" class="font-bold">KONTAK</a>
  </div>
  <div class="flex items-center space-x-4">
  <!-- Ikon Keranjang -->
<button id="openCart" onclick="toggleSchedulePopup()" class="text-white">
  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 19M17 13l1.6 6M6 21h12" />
  </svg>
</button>

<!-- Popup Schedule -->
<div id="schedulePopup" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-50 flex items-center justify-center hidden z-50">
  <div class="bg-white p-6 w-96 rounded-lg shadow-lg">
    <h2 class="text-xl font-bold mb-4">Pilih Jadwal</h2>
    <!-- Konten jadwal akan muncul di sini -->
    <button onclick="closeSchedulePopup()" class="mt-4 px-6 py-2 bg-red-500 text-white rounded">Tutup</button>
  </div>
</div>
<!-- Ikon User -->
<div class="relative">
  <button id="userBtn" onclick="toggleUserPopup()" class="text-white">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A11.956 11.956 0 0112 15c2.903 0 5.55 1.034 7.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
  </button>

  <!-- Dropdown User -->
  <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-lg hidden z-50">
    <a href="profil.php" class="block px-4 py-2 hover:bg-slate-100">Profil</a>
    <a href="riwayat.php" class="block px-4 py-2 hover:bg-slate-100">Riwayat Reservasi</a>
    <a href="logout.php" class="block px-4 py-2 hover:bg-slate-100">Keluar</a>
  </div>
</div>
</nav>
