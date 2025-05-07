<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Riwayat Penyewaan</title>
  <script src="https://tailwindcss-3.4.1.js"></script>
</head>
<body class="bg-gray-200 min-h-screen font-sans">
  <!-- Header -->
  <header class="bg-[#1B3554] text-white py-4">
    <div class="container mx-auto flex justify-between items-center px-4">
      <div class="flex items-center space-x-2">
        <img src="logo.png" alt="Logo" class="h-8" />
        <span class="font-bold text-xl">FORCUE</span>
      </div>
      <div class="flex items-center space-x-6">
        <input type="text" placeholder="Cari" class="px-2 py-1 rounded-md text-black" />
        <nav class="space-x-4 hidden md:block">
          <a href="#" class="hover:underline">BERANDA</a>
          <a href="#" class="hover:underline">TENTANG</a>
          <a href="#" class="hover:underline">LOKASI</a>
          <a href="#" class="hover:underline">KONTAK KAMI</a>
        </nav>
        <div class="flex space-x-4">
          <button><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h18M9 13l3 3L21 7" /></svg></button>
          <button><svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" /></svg></button>
        </div>
      </div>
    </div>
  </header>

  <!-- Back button -->
  <div class="container mx-auto mt-6 px-4">
    <button onclick="history.back()" class="bg-[#1B3554] text-white px-4 py-2 rounded-md flex items-center space-x-2">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
      </svg>
      <span>Kembali</span>
    </button>
  </div>

  <!-- Title -->
  <div class="container mx-auto text-center mt-6 px-4">
    <h1 class="text-2xl font-bold text-[#1B3554]">Riwayat Penyewaan</h1>
  </div>

  <!-- Table -->
  <div class="container mx-auto mt-6 px-4">
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-white">
        <thead class="bg-[#1B3554] text-center">
          <tr>
            <th class="px-6 py-3">Kode Resi</th>
            <th class="px-6 py-3">Tipe Meja</th>
            <th class="px-6 py-3">Tanggal penyewaan</th>
            <th class="px-6 py-3">Aksi</th>
          </tr>
        </thead>
        <tbody class="text-center bg-[#26476a]">

          <?php
          // Simulasi data riwayat penyewaan
          $riwayat = [
            ['resi' => 'RS001', 'tipe' => 'Meja Kecil', 'tanggal' => '2025-05-01'],
            ['resi' => 'RS002', 'tipe' => 'Meja Sedang', 'tanggal' => '2025-05-02'],
            ['resi' => 'RS003', 'tipe' => 'Meja Besar', 'tanggal' => '2025-05-03'],
          ];

          if (empty($riwayat)) {
            echo '<tr><td colspan="4" class="px-6 py-4">Tidak ada data penyewaan.</td></tr>';
          } else {
            foreach ($riwayat as $row) {
              echo "<tr class='border-b border-[#1B3554]'>";
              echo "<td class='px-6 py-4'>{$row['resi']}</td>";
              echo "<td class='px-6 py-4'>{$row['tipe']}</td>";
              echo "<td class='px-6 py-4'>{$row['tanggal']}</td>";
              echo "<td class='px-6 py-4'><a href='#' class='bg-white text-[#1B3554] font-semibold px-4 py-1 rounded-md'>Detail</a></td>";
              echo "</tr>";
            }
          }
          ?>

        </tbody>
      </table>
    </div>
  </div>
</body>
</html>