<form method="POST" action="{{ route('details') }}" id="formSchedule">
  @csrf
  <div id="schedulePanel" class="fixed top-0 right-0 w-80 bg-slate-300 h-full transform translate-x-full transition-transform duration-300 ease-in-out p-6 flex flex-col rounded-l-2xl shadow-lg z-50">
    <div class="flex justify-between items-center mb-6">
      <h2 class="text-xl font-bold">Jadwal Dipilih</h2>
      <button id="closeCart" type="button" class="text-2xl text-slate-900">&times;</button>
    </div>
    <div class="flex justify-between font-bold mb-2">
      <span>Tipe Meja</span>
      <span>No Meja</span>
    </div>
  <div id="schedulePopup" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
  <div class="bg-white p-6 w-[400px] rounded-lg shadow-lg space-y-4">
    <h2 class="text-xl font-bold">Detail Reservasi</h2>
    <p><strong>Tipe Meja:</strong> <span id="popupTipe"></span></p>
    <p><strong>Harga:</strong> <span id="popupHarga"></span></p>
    <p><strong>No Meja:</strong> <span id="popupNoMeja"></span></p>

    <!-- Tombol tutup -->
    <button onclick="closeSchedulePopup()" class="mt-4 px-6 py-2 bg-red-500 text-white rounded">Tutup</button>
  </div>
</div>

    <!-- Input hidden harus pakai ID agar bisa diakses JS -->
<input type="hidden" name="tipe_meja" id="tipe_meja_input">
<input type="hidden" name="tanggal" id="tanggal_input">
<input type="hidden" name="jam" id="jam_input">
<input type="hidden" name="no_meja" id="no_meja_input">
<input type="hidden" name="subtotal" id="subtotal_input">
<input type="hidden" name="total_akhir" id="total_akhir_input">

    <div class="space-y-4">
      <div class="border rounded p-4 bg-slate-200 flex justify-between items-center mb-6">
        <div class="text-sm">Senin, 12 Mei 2025, 19:00<br />Rp 150.000</div>
        <button class="text-slate-900" type="button">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142..." />
          </svg>
        </button>
      </div>
    </div>

    <button type="submit" class="mt-auto w-full bg-slate-900 text-white font-bold py-3 rounded">
      Selanjutnya
    </button>
  </div>

  <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>
</form>
<script>
// Fungsi isi data
function isiDataPemesanan(tipeMeja, tanggal, jam, noMeja, subtotal, totalAkhir) {
    document.getElementById('tipe_meja_input').value = tipeMeja;
    document.getElementById('tanggal_input').value = tanggal;
    document.getElementById('jam_input').value = jam;
    document.getElementById('no_meja_input').value = noMeja;
    document.getElementById('subtotal_input').value = subtotal;
    document.getElementById('total_akhir_input').value = totalAkhir;
}

  function bukaPopup(tipe, harga, no_meja) {
    document.getElementById('schedulePopup').classList.remove('hidden');

    // Isi data popup otomatis
    document.getElementById('popupTipe').textContent = tipe;
    document.getElementById('popupHarga').textContent = "Rp " + harga.toLocaleString();
    document.getElementById('popupNoMeja').textContent = no_meja;
  }

  function closeSchedulePopup() {
    document.getElementById('schedulePopup').classList.add('hidden');
  }

</script>


