<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Meja Reguler - Forcue</title>
  <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.js"></script>
  <style>
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
    /* Container Utama */
    .container {
      max-width: 1100px;
      margin: 2rem auto;
      padding: 0 1rem;
    }
    .back {
      margin-bottom: 1rem;
      font-size: 1rem;
      color: #1c2a41;
      text-decoration: none;
    }
    .meja-detail {
      display: flex;
      flex-wrap: wrap;
      gap: 2rem;
      margin-bottom: 2rem;
    }
    .meja-detail img {
      width: 100%;
      max-width: 400px;
      border-radius: 10px;
    }
    .meja-info {
      flex: 1;
    }
    .meja-info h2 {
      color: #1c2a41;
      font-size: 2rem;
      margin-bottom: 1rem;
    }
    .meja-info p {
      color: #333;
      line-height: 1.6;
    }

    /* Daftar Meja */
    .daftar-meja h3 {
      color: #1c2a41;
      margin-bottom: 1rem;
    }
    .meja-list {
      background: #1c2a41;
      border-radius: 20px;
      display: flex;
      align-items: center;
      padding: 1rem;
      margin-bottom: 1rem;
      color: white;
    }
    .meja-list img {
      width: 100px;
      height: 70px;
      object-fit: cover;
      border-radius: 10px;
      margin-right: 1rem;
    }
    .meja-list .info {
      flex: 1;
    }
    .meja-list button {
      background: #d3d8df;
      color: #333;
      border: none;
      border-radius: 20px;
      padding: 0.5rem 1rem;
      cursor: pointer;
      font-weight: bold;
    }

    /* Venue Info */
    .venue-info {
      margin-top: 2rem;
      color: #1c2a41;
    }
    .venue-info p, .venue-info ul {
      margin: 0.5rem 0;
    }
    .venue-info ul {
      padding-left: 1.2rem;
    }

    /* Footer */
    footer {
      background-color: #1c2a41;
      color: white;
      text-align: center;
      padding: 1rem;
      margin-top: 2rem;
      font-size: 0.9rem;
    }

    /* Pop Up */
    .popup {
      display: none;
      position: fixed;
      top: 0; left: 0;
      width: 100%; height: 100%;
      background: rgba(0,0,0,0.5);
      justify-content: center;
      align-items: center;
      z-index: 999;
      animation: fadeIn 0.3s;
    }
    .popup-content {
      background: #9bb1c5;
      padding: 20px;
      border-radius: 20px;
      width: 90%;
      max-width: 500px;
      position: relative;
      text-align: center;
      animation: slideIn 0.4s ease;
    }
    .popup-content h2 {
      margin-top: 0;
      color: #1c2a41;
    }

    /* Tombol Waktu */
    .time-buttons {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 10px;
      margin: 20px 0;
    }
    .time-buttons button {
      background: white;
      border: 1px solid gray;
      padding: 10px;
      border-radius: 10px;
      cursor: pointer;
    }
    .time-buttons button.selected {
      background: gray;
      color: white;
    }

    /* Tombol Action */
    .action {
      width: 100%;
      margin-top: 10px;
      padding: 15px;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }
    .reservasi {
      background: #1f3754;
      color: white;
    }
    .keranjang {
      background: #d3d8df;
      color: black;
    }

    /* Animasi */
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
    @keyframes slideIn {
      from {transform: translateY(-50px); opacity: 0;}
      to {transform: translateY(0); opacity: 1;}
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar">
  <div class="logo">
    <a href="#"><img src="logo.png" alt="Logo Forcue"></a>
  </div>
  <div class="nav-center">
    <input type="text" placeholder="Cari...">
    <a href="#">BERANDA</a>
    <a href="#tentang">TENTANG</a>
    <a href="#lokasi">LOKASI</a>
    <a href="#kontak">KONTAK KAMI</a>
  </div>
  <div class="nav-right">
    <button class="icon-btn">
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

<!-- Isi Konten -->
<div class="container">
  <a href="#" class="back">&larr; Kembali</a>

  <div class="meja-detail">
    <img src="platinum.jpeg" alt="Meja Biliar">
    <div class="meja-info">
      <h2>Meja Platinum</h2>
      <p>Meja Platinum merupakan pilihan terbaik dengan ukuran profesional 9ft. Dirancang untuk turnamen atau pemain berpengalaman, dilengkapi area duduk mewah, pencahayaan optimal, dan privasi lebih. Nikmati sensasi bermain kelas atas di lingkungan eksklusif.</p>
    </div>
  </div>

  <div class="daftar-meja">
    <h3>Daftar Meja</h3>

    <div class="meja-list">
      <img src="platinum.jpeg" alt="Meja 1">
      <div class="info">Meja 1</div>
      <button>Pilih Jadwal</button>
    </div>

    <div class="meja-list">
      <img src="platinum.jpeg" alt="Meja 2">
      <div class="info">Meja 2</div>
      <button>Pilih Jadwal</button>
    </div>

    <div class="meja-list">
      <img src="platinum.jpeg" alt="Meja 3">
      <div class="info">Meja 3</div>
      <button>Pilih Jadwal</button>
    </div>

  </div>

  <div class="venue-info">
    <h3>Aturan Venue</h3>
    <p>Buka setiap hari dari jam 11:00-21:00 WIB</p>
    <p>Dilarang Merokok di dalam ruangan</p>

    <h3>Fasilitas</h3>
    <ul>
      <li>Jual Makanan Ringan</li>
      <li>Jual Minuman</li>
      <li>Parkir Motor</li>
      <li>Parkir Mobil</li>
      <li>Toilet</li>
    </ul>
  </div>

</div>

<footer>
  ©2025 Forcue. All Rights Reserved.
</footer>

<!-- Pop Up Formulir -->
<div class="popup" id="popup">
  <div class="popup-content">
    <h2>Formulir Reservasi</h2>

    <div style="display: flex; flex-wrap: wrap; gap: 20px;">

      <!-- Bagian Kiri -->
      <div style="flex: 1; min-width: 200px;">
        <label for="date">Tanggal</label><br>
        <input type="date" id="date" style="padding: 10px; border-radius: 10px; margin: 10px 0; width: 100%;"><br>

        <label>Waktu</label>
        <div class="time-buttons" id="timeButtons">
          <button onclick="selectTime(this)">11:00-12:00</button>
          <button onclick="selectTime(this)">12:00-13:00</button>
          <button onclick="selectTime(this)">14:00-15:00</button>
          <button onclick="selectTime(this)">15:00-16:00</button>
          <button onclick="selectTime(this)">16:00-17:00</button>
          <button onclick="selectTime(this)">17:00-18:00</button>
          <button onclick="selectTime(this)">18:00-19:00</button>
          <button onclick="selectTime(this)">19:00-20:00</button>
          <button onclick="selectTime(this)">20:00-21:00</button>
        </div>
      </div>

      <!-- Bagian Kanan -->
      <div style="flex: 1; min-width: 150px; display: flex; justify-content: center; align-items: center;">
        <div style="background-color: #f1f5f9; border-radius: 10px; padding: 20px; width: 100%; max-width: 300px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
          <div style="display: flex; flex-direction: column; gap: 15px;">
            <div>
              <strong>Tipe Meja :</strong> Meja Platinum
            </div>
            <div>
              <strong>No Meja :</strong> <span id="noMeja">Meja 1</span>
            </div>
          </div>
        </div>
      </div>

    </div>

    <button class="action reservasi" onclick="closePopup()">Reservasi Sekarang</button>
    <button class="action keranjang" onclick="closePopup()">Tambah ke Keranjang</button>
  </div>
</div>

<!-- Script -->
<script>
  function openPopup(meja) {
    document.getElementById('popup').style.display = 'flex';
    document.getElementById('noMeja').innerText = meja;
  }

  function closePopup() {
    document.getElementById('popup').style.display = 'none';
  }

  function selectTime(button) {
    const buttons = document.querySelectorAll('.time-buttons button');
    buttons.forEach(btn => btn.classList.remove('selected'));
    button.classList.add('selected');
  }

  document.querySelectorAll('.meja-list button').forEach((btn, index) => {
    btn.addEventListener('click', function() {
      openPopup('Meja ' + (index + 1));
    });
  });
</script>

</body>
</html>


