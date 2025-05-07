<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Resi Penyewaan</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#C3CCD5] font-sans text-[#1F3C5A]">

  <!-- Header -->
  <!-- Header -->
<header class="bg-[#1F3C5A] p-4 flex items-center justify-between text-white">
  <img src="logo.png" alt="Logo Forcue" class="h-10">
  <div class="flex items-center space-x-4">
    <input type="text" placeholder="Cari" class="rounded-full px-4 py-1 text-sm text-black" />
    <nav class="space-x-4 font-semibold hidden sm:block">
      <a href="#">BERANDA</a>
      <a href="#">TENTANG</a>
      <a href="#">LOKASI</a>
      <a href="#">KONTAK KAMI</a>
    </nav>
    <!-- Icon keranjang -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13l-1.2 6.4a1 1 0 001 1.6h10.4a1 1 0 001-1.6L17 13M7 13H5.4" />
    </svg>
    <!-- Icon profil -->
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 1117.804 5.121 9 9 0 015.121 17.804zM15 11a3 3 0 11-6 0 3 3 0 016 0z" />
    </svg>
  </div>
</header>


  <!-- Konten -->
  <main class="max-w-xl mx-auto py-10">
    <h1 class="text-2xl font-bold text-center mb-6">Resi Penyewaan</h1>
    
    <div class="bg-[#2D506D] text-white rounded-2xl p-8 space-y-4">
      <div class="flex justify-center mb-4">
        <img src="logo.png" alt="Logo" class="h-14">
      </div>

      <div class="space-y-2 text-sm">
        <div class="border-b border-white pb-2"><span class="font-bold">Kode Resi:</span> #RESI001</div>
        <div class="border-b border-white pb-2"><span class="font-bold">Nama Pelanggan:</span> Budi</div>
        <div class="border-b border-white pb-2"><span class="font-bold">Tipe Meja:</span> VIP</div>
        <div class="border-b border-white pb-2"><span class="font-bold">No Meja:</span> 4</div>
        <div class="border-b border-white pb-2"><span class="font-bold">Tanggal:</span> 2025-05-06</div>
        <div class="border-b border-white pb-2"><span class="font-bold">Waktu:</span> 15:00 - 17:00</div>
        <div class="border-b border-white pb-2"><span class="font-bold">Total Harga:</span> Rp 100.000</div>
      </div>

      <div class="pt-4">
        <button class="w-full border-2 border-white rounded-full py-2 font-bold">Simpan sebagai PDF</button>
      </div>
    </div>
  </main>

</body>
</html>