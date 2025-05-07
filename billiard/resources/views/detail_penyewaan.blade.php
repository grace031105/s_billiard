<?php
// detail_penyewaan.php
?>
<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Detail Penyewaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
  </head>
  <body class="bg-gray-300 font-sans">
    <!-- Header -->
    <header class="bg-[#1c2f45] text-white px-8 py-4 flex items-center justify-between">
      <div class="flex items-center gap-3">
        <img src="logo.png" alt="Logo" class="w-12 h-12" />
        <span class="text-base font-semibold">FORCUE</span>
      </div>
      <div class="flex items-center gap-6">
        <div class="relative">
          <input
            type="text"
            placeholder="Cari"
            class="px-4 py-2 text-sm rounded-md focus:outline-none text-black"
          />
          <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
            🔍
          </span>
        </div>
        <nav class="hidden md:flex gap-6 text-sm font-semibold">
          <a href="#">BERANDA</a>
          <a href="#">TENTANG</a>
          <a href="#">LOKASI</a>
          <a href="#">KONTAK KAMI</a>
        </nav>
        <div class="flex gap-4">
          <span class="text-xl">🛒</span>
          <span class="text-xl">👤</span>
        </div>
      </div>
    </header>

    <main class="p-10 max-w-5xl mx-auto">
      <h1 class="text-center text-3xl font-bold text-[#1c2f45] mb-10">Detail Penyewaan</h1>

      <!-- Data Pelanggan -->
      <section class="bg-[#1c2f45] text-white p-6 rounded-lg mb-8">
        <h2 class="text-2xl font-bold mb-4">Data Pelanggan</h2>
        <div class="grid grid-cols-2 gap-4">
          <p>Nama : <?php echo isset($nama) ? htmlspecialchars($nama) : ''; ?></p>
          <p>Email : <?php echo isset($email) ? htmlspecialchars($email) : ''; ?></p>
        </div>
      </section>

      <!-- Data Penyewaan -->
      <section class="bg-[#1c2f45] text-white p-6 rounded-lg mb-8">
        <h2 class="text-2xl font-bold mb-4">Data Penyewaan</h2>
        <div class="grid grid-cols-2 gap-4">
          <p>Tipe Meja : <?php echo isset($tipe_meja) ? htmlspecialchars($tipe_meja) : ''; ?></p>
          <p>Tanggal : <?php echo isset($tanggal) ? htmlspecialchars($tanggal) : ''; ?></p>
          <p>Jam : <?php echo isset($jam) ? htmlspecialchars($jam) : ''; ?></p>
          <p>No Meja : <?php echo isset($no_meja) ? htmlspecialchars($no_meja) : ''; ?></p>
        </div>
        <hr class="my-4 border-white/50" />
        <div class="grid grid-cols-2 text-lg font-medium">
          <p>Subtotal : Rp <?php echo isset($subtotal) ? number_format($subtotal, 0, ',', '.') : ''; ?></p>
          <p>Total Akhir : Rp <?php echo isset($total_akhir) ? number_format($total_akhir, 0, ',', '.') : ''; ?></p>
        </div>
      </section>

      <!-- Tombol Pembayaran -->
      <div class="text-center mb-10">
        <button class="bg-[#1c2f45] text-white px-8 py-3 rounded-full font-semibold text-lg shadow-md hover:bg-[#163047]">
          ↓ Pembayaran ↓
        </button>
      </div>

      <!-- Pembayaran -->
      <section class="bg-[#1c2f45] text-white p-6 rounded-lg mb-12">
        <h2 class="text-2xl font-bold mb-6">Selesaikan Pembayaran</h2>
        <p class="text-center mb-2 text-lg">Lakukan pembayaran sebesar</p>
        <p class="text-center font-bold text-red-500 text-2xl bg-gray-100 text-black inline-block px-6 py-2 rounded mb-4">
          Rp. <?php echo isset($total_akhir) ? number_format($total_akhir, 0, ',', '.') : 'NOMINAL'; ?>
        </p>

        <p class="text-center text-sm mb-2">
          Setelah melakukan pembayaran, silahkan upload pembayaran untuk mengkonfirmasi pesanan anda
        </p>
        <p class="text-center text-sm mb-6">
          Ketika pesanan sudah dikonfirmasi, maka pesanan anda akan terjadwal
        </p>

        <!-- Metode Pembayaran -->
        <form method="POST" enctype="multipart/form-data" class="space-y-6">
          <select name="metode" class="w-full p-3 rounded bg-gray-300 text-black">
            <option>Metode Pembayaran</option>
            <option value="transfer">BNI</option>
          </select>
          <!-- Tambahkan ini di dalam <form> kamu, di bawah <select> metode -->
<div id="bni-form" class="hidden bg-gray-400 p-6 rounded-lg mt-6 text-center max-w-md mx-auto">
  <div class="flex justify-between mb-4">
    <span class="bg-[#1c2f45] text-white px-4 py-2 rounded-full">No. Rek : 123456</span>
    <span class="bg-[#1c2f45] text-white px-4 py-2 rounded-full">Nama : acejezah</span>
  </div>

  <div class="bg-gray-300 border border-gray-600 rounded-lg py-4 px-2 mb-4">
    <p class="text-sm mb-2">Selesaikan pembayaran sebelum</p>
    <div id="countdown" class="text-lg font-bold bg-[#1c2f45] text-white inline-block px-4 py-2 rounded mb-2">00 : 15 : 00</div>
    <p class="text-sm">Batas Waktu: <span id="deadline-text">--</span></p>
  </div>

  <button type="submit" class="w-full bg-[#1c2f45] text-white py-3 font-semibold rounded hover:bg-[#163047]">
    Selanjutnya
  </button>
</div>

<script>
  // Tampilkan form saat BNI dipilih
  document.querySelector('select[name=\"metode\"]').addEventListener('change', function () {
    const bniForm = document.getElementById('bni-form');
    if (this.value === 'bni') {
      bniForm.classList.remove('hidden');
      startCountdown();
    } else {
      bniForm.classList.add('hidden');
    }
  });

  // Countdown timer
  function startCountdown() {
    let duration = 15 * 60; // 15 menit
    const countdownEl = document.getElementById('countdown');
    const deadlineText = document.getElementById('deadline-text');
    const deadline = new Date(Date.now() + duration * 1000);

    deadlineText.textContent = deadline.toLocaleString('id-ID', {
      day: '2-digit', month: 'long', year: 'numeric',
      hour: '2-digit', minute: '2-digit'
    });

    const timer = setInterval(() => {
      const minutes = Math.floor(duration / 60);
      const seconds = duration % 60;
      countdownEl.textContent = `00 : ${String(minutes).padStart(2, '0')} : ${String(seconds).padStart(2, '0')}`;
      if (--duration < 0) {
        clearInterval(timer);
        countdownEl.textContent = '00 : 00 : 00';
      }
    }, 1000);
  }
</script>
          <!-- Upload File -->
          <div class="flex items-center justify-between bg-gray-400 text-white rounded px-4 py-3">
            <label for="file" class="font-bold">Pilih File</label>
            <input type="file" name="bukti" id="file" class="text-sm text-white" />
          </div>

          <!-- Tombol Konfirmasi -->
          <button type="submit" name="konfirmasi" class="w-full bg-green-700 text-white py-3 font-bold rounded hover:bg-green-800">
            *Unggah & Konfirmasi Pembayaran *
          </button>
        </form>
      </section>

      <!-- Footer -->
      <footer class="text-center text-xs text-white py-6 bg-[#1c2f45]">
        &copy;2025 Forcue. All Rights Reserved.
      </footer>
    </main>
  </body>
</html>

