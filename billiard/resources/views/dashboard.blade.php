<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>FORCUE - Reservasi Billiard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
  <link href="https://tailwindcss-3.4.1.js" rel="stylesheet">
    <style>
  <style>
    /* CSS kamu tetap, aku tambahkan sedikit untuk sidebar */
    body {
      margin: 0;
      font-family: 'Segoe UI', sans-serif;
      background-color: #e2e8f0;
      color: #1a202c;
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0.7rem 1.5rem;
      background-color: #0f172a;
      color: white;
    }
    .logo img {
      height: 40px;
    }
    .nav-center {
      display: flex;
      align-items: center;
      gap: 1.5rem;
    }
    .nav-center a, .nav-right a {
      color: white;
      text-decoration: none;
      font-weight: bold;
      font-size: 0.9rem;
    }
    .nav-center input {
      padding: 0.3rem 0.7rem;
      border-radius: 5px;
      border: none;
      font-size: 0.9rem;
    }
    .nav-right {
      display: flex;
      align-items: center;
      gap: 0.7rem;
    }
    .icon-btn {
      background: none;
      border: none;
      color: white;
      font-size: 1rem;
      cursor: pointer;
    }
    .hero {
      position: relative;
      background: url('gambar2.png') center/cover no-repeat;
      height: 400px;
      display: flex;
      align-items: center;
      justify-content: flex-start;
      text-align: left;
      padding-left: 5rem;
    }
    .hero-content {
      color: white;
      background-color: rgba(0,0,0,0.4);
      padding: 2rem;
      border-radius: 10px;
      opacity: 0;
      transform: translateX(-100px);
      transition: all 0.8s ease;
    }
    .hero-content.show {
      opacity: 1;
      transform: translateX(0);
    }
    .meja-section {
      padding: 2rem;
      text-align: center;
      opacity: 0;
      transform: translateX(80px);
      transition: all 0.8s ease;
    }
    .meja-section.show {
      opacity: 1;
      transform: translateX(0);
    }
    .meja-cards {
      display: flex;
      justify-content: center;
      gap: 2rem;
      flex-wrap: wrap;
      margin-top: 1rem;
    }
    .card {
      background-color: #334155;
      color: white;
      border-radius: 10px;
      width: 200px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      opacity: 0;
      transform: translateX(-100px);
      transition: all 0.8s ease;
    }
    .card.show {
      opacity: 1;
      transform: translateX(0);
    }
    .card:nth-child(even) {
      transform: translateX(100px);
    }
    .card:nth-child(even).show {
      transform: translateX(0);
    }
    .card img {
      width: 100%;
      height: 150px;
      object-fit: cover;
    }
    .card h3 {
      margin: 1rem 0 0.5rem;
    }
    .card button {
      margin-bottom: 1rem;
      padding: 0.5rem 1rem;
      border: none;
      background: #cbd5e1;
      color: black;
      font-weight: bold;
      border-radius: 5px;
      cursor: pointer;
    }
    .why, .lokasi {
      padding: 2rem;
      text-align: center;
    }
    .why {
      background-color: #cbd5e1;
    }
    .lokasi {
      background-color: #0f172a;
      color: white;
    }
    .lokasi iframe {
      margin-top: 1rem;
      border-radius: 10px;
      width: 100%;
      height: 300px;
      border: 0;
    }
    .footer {
      background-color: #0f172a;
      color: white;
      padding: 2rem;
      text-align: center;
    }
    .footer h3 {
      margin-bottom: 0.5rem;
      color: #38bdf8;
    }
    .footer p {
      margin: 0.3rem 0;
    }
    .social-icons i {
      margin: 0 10px;
      font-size: 1.5rem;
      cursor: pointer;
      transition: color 0.3s;
    }
    .social-icons i:hover {
      color: #38bdf8;
    }
    .copyright {
      margin-top: 2rem;
      font-size: 0.8rem;
      color: #cbd5e1;
    }
    /* Sidebar */
    #schedulePanel {
      position: fixed;
      top: 0;
      right: 0;
      width: 350px;
      height: 100%;
      background-color: #cbd5e1;
      box-shadow: -2px 0 5px rgba(0,0,0,0.2);
      transform: translateX(100%);
      transition: transform 0.3s ease-in-out;
      z-index: 999;
      padding: 20px;
      display: flex;
      flex-direction: column;
      border-top-left-radius: 20px;
      border-bottom-left-radius: 20px;
    }
    #schedulePanel.active {
      transform: translateX(0);
    }
    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.5);
      display: none;
      z-index: 998;
    }
    .overlay.active {
      display: block;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="logo">
    <a href="#"><img src="gambar3.png" alt="Logo Forcue"></a>
  </div>
  <div class="nav-center">
    <input type="text" placeholder="Cari...">
    <a href="#">BERANDA</a>
    <a href="#tentang">TENTANG</a>
    <a href="#lokasi">LOKASI</a>
    <a href="#kontak">KONTAK KAMI</a>
  </div>
  <div class="nav-right">
    <button class="icon-btn" id="openCart">
      <i class="fas fa-shopping-cart"></i>
    </button>

    <?php if (isset($_SESSION['nama_pengguna'])): ?>
      <span>Halo, <?php echo htmlspecialchars($_SESSION['nama_pengguna']); ?></span>
      <a href="logout.php" class="icon-btn">
        <i class="fas fa-user"></i>
      </a>
    <?php else: ?>
      <a href="login.php" class="icon-btn">MASUK</a>
    <?php endif; ?>
  </div>
</nav>

<!-- Hero -->
<section class="hero">
  <div class="hero-content">
    <h1>CHALLENGE ACCEPTED!<br>SIAP ADU SKILL DI MEJA BILLIARD?</h1>
    <p>Klik tombol dibawah untuk reservasi meja billiard.</p>
    <div style="margin-top: 1rem;">
      <button>Pesan Sekarang</button>
    </div>
  </div>
</section>

<!-- Pilih Meja -->
<section id="pilih-meja" class="meja-section">
  <h2>TENTUKAN PILIHANMU</h2>
  <div class="meja-cards">
    <div class="card">
      <img src="gambar4.png" alt="Meja Reguler">
      <h3>MEJA REGULER</h3>
      <a href="meja_reguler.php">
        <button>Pilih Meja</button>
      </a>
    </div>
    <div class="card">
      <img src="vip.png" alt="Meja VIP">
      <h3>MEJA VIP</h3>
      <a href="gambar5.php">
        <button>Pilih Meja</button>
      </a>
    </div>
    <div class="card">
      <img src="gambar6.png" alt="Meja Platinum">
      <h3>MEJA PLATINUM</h3>
      <a href="meja_platinum.php">
        <button>Pilih Meja</button>
      </a>
    </div>
  </div>
</section>

<!-- Mengapa Forcue -->
<section id="tentang" class="why">
  <h2>MENGAPA FORCUE?</h2>
  <p>Karena kami tahu betapa menyebalkannya datang ke tempat biliar dan harus antre lama. Forcue hadir sebagai solusi digital untuk mempermudah proses reservasi, biar kamu bisa lebih fokus menikmati permainan.</p>
</section>

<!-- Lokasi -->
<section id="lokasi" class="lokasi">
  <h2>Lokasi Billiard</h2>
  <iframe src="https://maps.google.com/maps?q=Kepri%20Mall%20Batam&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen loading="lazy"></iframe>
</section>

<!-- Footer -->
<footer id="kontak" class="footer">
  <!-- Footer content -->
</footer>

<!-- Sidebar Jadwal Dipilih -->
<div id="schedulePanel">
  <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
    <h2 style="font-weight: bold;">Jadwal Dipilih</h2>
    <button id="closeCart" style="background:none; border:none; font-size:1.5rem; cursor:pointer;">
      <i class="fas fa-times"></i>
    </button>
  </div>

  <div style="margin-bottom: 1rem;">
    <div style="display: flex; justify-content: space-between; font-weight: bold; margin-bottom: 0.5rem;">
      <span>Tipe Meja</span>
      <span>No Meja</span>
    </div>
    <div style="border: 1px solid #0f172a; border-radius: 8px; padding: 1rem; background: #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
      <div style="font-size: 0.9rem;">
        Hari, Tanggal, Waktu, Tahun<br>
        Harga
      </div>
      <button style="background:none; border:none; color:#1a202c;">
        <i class="fas fa-trash"></i>
      </button>
    </div>
  </div>

  <button style="width: 100%; background-color: #0f172a; color: white; font-weight: bold; padding: 1rem; border-radius: 10px; margin-top: auto;">Selanjutnya</button>
</div>

<div class="overlay" id="overlay"></div>

<!-- Footer -->
<footer id="kontak" class="footer">
  <div style="font-size: 2rem; font-weight: bold;">
    FORCUE
  </div>

  <hr style="margin: 1.5rem 0; border: 1px solid #38bdf8;">

  <div style="display: flex; justify-content: space-around; flex-wrap: wrap; text-align: left;">
    <div>
      <h3>Informasi Kontak</h3>
      <p><i class="fas fa-envelope"></i> forcue@billiard.co.id</p>
      <p><i class="fab fa-whatsapp"></i> +6287653866201</p>
      <p><i class="fas fa-map-marker-alt"></i> Komplek Gedung Emporium, Hall C, Batam Center</p>
    </div>
    <div>
      <h3>Jam Operasional</h3>
      <p>Senin – Jumat</p>
      <p>08.00 – 17.00 WIB</p>
    </div>
    <div>
      <h3>Media Sosial</h3>
      <div class="social-icons">
        <i class="fab fa-instagram"></i>
        <i class="fab fa-facebook"></i>
        <i class="fab fa-twitter"></i>
      </div>
    </div>
  </div>

  <div class="copyright">
    <p>&copy; 2025 Forcue Billiard. All Rights Reserved.</p>
  </div>
</footer>

<script>
  // Animasi awal
  document.addEventListener('DOMContentLoaded', () => {
    document.querySelector('.hero-content').classList.add('show');
    document.querySelector('.meja-section').classList.add('show');
    document.querySelectorAll('.card').forEach((card, index) => {
      setTimeout(() => {
        card.classList.add('show');
      }, index * 200);
    });

    // Sidebar Jadwal
    const openCart = document.getElementById('openCart');
    const closeCart = document.getElementById('closeCart');
    const schedulePanel = document.getElementById('schedulePanel');
    const overlay = document.getElementById('overlay');

    openCart.addEventListener('click', () => {
      schedulePanel.classList.add('active');
      overlay.classList.add('active');
    });

    closeCart.addEventListener('click', () => {
      schedulePanel.classList.remove('active');
      overlay.classList.remove('active');
    });

    overlay.addEventListener('click', () => {
      schedulePanel.classList.remove('active');
      overlay.classList.remove('active');
    });
  });
</script>

</body>
</html>
