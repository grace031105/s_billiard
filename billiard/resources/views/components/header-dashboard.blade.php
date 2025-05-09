<nav class="flex items-center justify-between px-6 py-4 bg-slate-900 text-white">
  <a href="#"><img src="{{ asset('logo.png') }}" alt="Logo Forcue" class="h-10" /></a>
  <div class="flex items-center space-x-6">
    <input type="text" placeholder="Cari..." class="rounded px-3 py-1 text-sm text-black" />
    <a href="#" class="font-bold">BERANDA</a>
    <a href="#tentang" class="font-bold">TENTANG</a>
    <a href="#lokasi" class="font-bold">LOKASI</a>
    <a href="#kontak" class="font-bold">KONTAK</a>
  </div>
  <div class="flex items-center space-x-4">
    <button id="openCart" class="text-white"><i class="fas fa-shopping-cart"></i></button>
    <div class="relative">
      <button id="userBtn" class="flex items-center text-white focus:outline-none">
        <i class="fas fa-user-circle text-2xl"></i>
      </button>
      <div id="userDropdown" class="absolute right-0 mt-2 w-48 bg-white text-black rounded shadow-lg hidden z-50">
        <a href="{{ url('profil') }}" class="block px-4 py-2 hover:bg-slate-100">Profil</a>
        <a href="{{ url('riwayat') }}" class="block px-4 py-2 hover:bg-slate-100">Riwayat Reservasi</a>
        <a href="{{ url('logout') }}" class="block px-4 py-2 hover:bg-slate-100">Keluar</a>
      </div>
    </div>
  </div>
</nav>
