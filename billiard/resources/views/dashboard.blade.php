<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>FORCUE - Reservasi Billiard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-200 font-sans text-slate-800">

<!-- Navbar -->
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
    <button id="openCart" class="text-white">
      <i class="fas fa-shopping-cart"></i>
    </button>
    <?php if (isset($_SESSION['nama_pengguna'])): ?>
      <span>Halo, <?php echo htmlspecialchars($_SESSION['nama_pengguna']); ?></span>
      <a href="logout.php"><i class="fas fa-user"></i></a>
    <?php else: ?>
      <a href="login" class="font-bold">MASUK</a>
    <?php endif; ?>
  </div>
</nav>

<!-- Hero Section -->
<section class="relative bg-cover bg-center h-[400px]" style="background-image: url('/images/gambar2.png');">
  <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center pl-10 md:pl-20">
    <div class="text-white space-y-4 animate-fadeInLeft max-w-xl">
      <h1 class="text-3xl md:text-4xl font-bold leading-tight">
        CHALLENGE ACCEPTED!<br />SIAP ADU SKILL DI MEJA BILLIARD?
      </h1>
      <p>Klik tombol di bawah untuk reservasi meja billiard.</p>
      <button class="mt-4 px-6 py-2 bg-cyan-400 hover:bg-cyan-500 text-black font-bold rounded">Pesan Sekarang</button>
    </div>
  </div>
</section>

<!-- Pilih Meja -->
<section id="pilih-meja" class="py-16 text-center">
  <h2 class="text-2xl font-bold mb-10">TENTUKAN PILIHANMU</h2>
  <div class="container mx-auto flex flex-wrap justify-center gap-8">
    <!-- Meja Card -->
    <?php
      $meja = [
        ['src' => '/images/gambar4.jpeg', 'judul' => 'MEJA REGULER', 'link' => 'meja_reguler'],
        ['src' => '/images/gambar5.jpeg', 'judul' => 'MEJA VIP', 'link' => 'meja_vip'],
        ['src' => '/images/gambar6.jpeg', 'judul' => 'MEJA PLATINUM', 'link' => 'meja_platinum'],
      ];
      foreach ($meja as $m):
    ?>
    <div class="bg-slate-700 text-white rounded-lg overflow-hidden w-60 shadow-md hover:shadow-lg transform hover:-translate-y-2 transition">
      <img src="<?= $m['src']; ?>" alt="<?= $m['judul']; ?>" class="h-40 w-full object-cover" />
      <div class="p-4 space-y-3">
        <h3 class="text-lg font-bold"><?= $m['judul']; ?></h3>
        <a href="<?= $m['link']; ?>" class="block bg-slate-300 text-black font-bold py-2 rounded">Pilih Meja</a>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- Mengapa Forcue -->
<section id="tentang" class="bg-slate-300 py-16 text-center">
  <h2 class="text-2xl font-bold mb-6">MENGAPA FORCUE?</h2>
  <p class="max-w-3xl mx-auto px-6 leading-relaxed">
    Karena kami tahu betapa menyebalkannya datang ke tempat biliar dan harus antre lama. Forcue hadir sebagai solusi digital untuk mempermudah proses reservasi, biar kamu bisa lebih fokus menikmati permainan.
  </p>
</section>

<!-- Lokasi -->
<section id="lokasi" class="bg-slate-900 text-white py-16 text-center">
  <h2 class="text-2xl font-bold mb-6">Lokasi Billiard</h2>
  <div class="max-w-4xl mx-auto px-6">
    <iframe src="https://maps.google.com/maps?q=Kepri%20Mall%20Batam&t=&z=13&ie=UTF8&iwloc=&output=embed" class="w-full h-80 rounded-lg" allowfullscreen loading="lazy"></iframe>
  </div>
</section>

<!-- Footer -->
<footer id="kontak" class="bg-slate-900 text-white px-6 py-16 text-center space-y-10">
  <div class="text-3xl font-bold">FORCUE</div>
  <hr class="border-cyan-400 w-1/2 mx-auto" />
  <div class="flex flex-wrap justify-center gap-12 text-left max-w-5xl mx-auto">
    <div>
      <h3 class="text-cyan-400 font-bold mb-2">Informasi Kontak</h3>
      <p><i class="fas fa-envelope"></i> forcue@billiard.co.id</p>
      <p><i class="fab fa-whatsapp"></i> +6287653866201</p>
      <p><i class="fas fa-map-marker-alt"></i> Komplek Gedung Emporium, Hall C, Batam Center</p>
    </div>
    <div>
      <h3 class="text-cyan-400 font-bold mb-2">Jam Operasional</h3>
      <p>Senin – Jumat</p>
      <p>08.00 – 17.00 WIB</p>
    </div>
    <div>
      <h3 class="text-cyan-400 font-bold mb-2">Media Sosial</h3>
      <div class="flex space-x-4 text-2xl">
        <i class="fab fa-instagram cursor-pointer hover:text-cyan-400"></i>
        <i class="fab fa-facebook cursor-pointer hover:text-cyan-400"></i>
        <i class="fab fa-twitter cursor-pointer hover:text-cyan-400"></i>
      </div>
    </div>
  </div>
  <div class="text-sm text-cyan-300 mt-8">&copy; 2025 Forcue Billiard. All Rights Reserved.</div>
</footer>

<!-- Sidebar -->
<div id="schedulePanel" class="fixed top-0 right-0 w-80 bg-slate-300 h-full transform translate-x-full transition-transform duration-300 ease-in-out p-6 flex flex-col rounded-l-2xl shadow-lg z-50">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold">Jadwal Dipilih</h2>
    <button id="closeCart" class="text-2xl text-slate-900">&times;</button>
  </div>

  <div class="flex justify-between font-bold mb-2">
    <span>Tipe Meja</span>
    <span>No Meja</span>
  </div>
  <div class="border rounded p-4 bg-slate-200 flex justify-between items-center mb-6">
    <div class="text-sm">Hari, Tanggal, Waktu, Tahun<br />Harga</div>
    <button class="text-slate-900"><i class="fas fa-trash"></i></button>
  </div>
  <button class="mt-auto w-full bg-slate-900 text-white font-bold py-3 rounded">Selanjutnya</button>
</div>
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

<script>
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

<style>
@keyframes fadeInLeft {
  from {
    opacity: 0;
    transform: translateX(-50px);
  }
  to {
    opacity: 1;
    transform: translateX(0);
  }
}
.animate-fadeInLeft {
  animation: fadeInLeft 1s ease-out forwards;
}
</style>

</body>
</html>
