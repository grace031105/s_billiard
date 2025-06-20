<div id="popup" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 justify-center items-center">
  <div class="bg-[#9bb1c5] p-6 rounded-2xl w-full max-w-xl text-center relative">
    <!-- Tombol Tutup -->
    <button onclick="closePopup()" class="absolute top-2 right-4 text-xl font-bold text-[#1c2a41] hover:text-red-600">×</button>

    <h2 class="text-2xl font-bold text-[#1c2a41] mb-4">Formulir Reservasi</h2>

    <div class="flex flex-wrap gap-6 mb-6">
      <!-- Kiri -->
      <div class="flex-1 min-w-[200px]">
        <label for="date" class="block text-left">Tanggal</label>
        <input type="date" id="date" class="w-full p-2 rounded mt-1">

        <label class="block mt-4 text-left">Waktu</label>
        <div class="grid grid-cols-3 gap-2 mt-2 time-buttons">
          @foreach(['09:00-10:00','10:00-11:00','11:00-13:00','13:00-14:00','14:00-16:00','16:00-17:00','17:00-19:00','19:00-20:00','20:00-21:00'] as $jam)
            <button onclick="selectTime(this)" class="bg-white border border-gray-400 p-2 rounded cursor-pointer">{{ $jam }}</button>
          @endforeach
        </div>
      </div>

      <!-- Kanan -->
      <div class="flex-1 flex justify-center items-center">
        <div class="bg-gray-100 p-4 rounded-lg w-full max-w-sm">
          <div class="space-y-2">
            <div><strong>Tipe Meja :</strong> Meja Reguler</div>
            <div><strong>No Meja :</strong> <span id="noMeja">Meja 1</span></div>
          </div>
        </div>
      </div>
    </div>

    <button onclick="lanjutKeDetailDanKirim()" class="...">Reservasi Sekarang</button>
    <button onclick="tambahKeKeranjang()" class="w-full bg-[#d3d8df] text-black py-3 rounded font-bold">Tambah ke Keranjang</button>
  </div>
</div>

<!-- Pop-up Keranjang -->
<div id="cart-popup" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 justify-center items-center">
  <div class="bg-[#9bb1c5] p-6 rounded-2xl w-full max-w-xl text-center relative">
    <button onclick="closeCartPopup()" class="absolute top-2 right-4 text-xl font-bold text-[#1c2a41] hover:text-red-600">×</button>
    <h2 class="text-2xl font-bold text-[#1c2a41] mb-4">Keranjang Belanja</h2>

    <div id="cart-items" class="space-y-4">
      <!-- Isi keranjang akan dimasukkan di sini -->
    </div>

    <button onclick="prosesPembelian()" class="w-full bg-[#1f3754] text-white py-3 rounded font-bold mb-3">Proses Pembelian</button>
  </div>
</div>
<script>
function lanjutKeDetailDanKirim() {
   const tipeMeja = document.querySelector('#popup strong').parentElement.innerText.replace('Tipe Meja :', '').trim();
    const tanggal = document.getElementById('date').value;
    const jam = selectedTime; // sudah diset waktu klik tombol jam
    const noMeja = document.getElementById('noMeja').innerText;

    if (!tanggal || !jam) {
        alert("Silakan pilih tanggal dan waktu terlebih dahulu.");
        return;
    }

    let subtotal = 150000;
    if (tipeMeja.toLowerCase().includes('vip')) subtotal = 250000;

    const totalAkhir = subtotal + 20000;

    // Panggil fungsi isi data
    isiDataPemesanan(tipeMeja, tanggal, jam, noMeja, subtotal, totalAkhir);

    // Submit form
    document.querySelector('#formSchedule')?.submit();
}

</script>
