<section class="bg-[#1c2f45] text-white p-6 rounded-lg mb-12">
    <h2 class="text-2xl font-bold mb-6">Selesaikan Pembayaran</h2>
    <p class="text-center mb-2 text-lg">Lakukan pembayaran sebesar</p>
    <p class="text-center font-bold text-red-500 text-2xl bg-gray-100 text-black inline-block px-6 py-2 rounded mb-4">
        Rp. {{ number_format($total_akhir ?? 0, 0, ',', '.') }}
    </p>
    
    <p class="text-center text-sm mb-2">
      Setelah melakukan pembayaran, silakan upload bukti pembayaran untuk mengkonfirmasi pesanan Anda.
    </p>
    <p class="text-center text-sm mb-6">
      Jika pesanan sudah dikonfirmasi, maka pesanan Anda akan terjadwal.
    </p>

    <!--  FORM PEMBAYARAN -->
    <form 
        method="POST" 
        action="{{ route('pembayaran.konfirmasi') }}" 
        enctype="multipart/form-data" 
        class="space-y-6"
    >
        @csrf

        <!-- Hidden: id_reservasi atau id_meja -->
        <input type="hidden" name="id_reservasi" value="{{ $reservasi->id ?? '' }}">
        <input type="hidden" name="total_akhir" value="{{ $total_akhir ?? 0 }}">

        <!-- Metode Pembayaran -->
        <select name="metode" class="w-full p-3 rounded bg-gray-300 text-black">
            <option disabled selected>Pilih Metode Pembayaran</option>
            <option value="bni">BNI</option>
        </select>

        <!-- Info Rekening & Timer -->
        <div id="bni-form" class="hidden bg-gray-400 p-6 rounded-lg mt-6 text-center max-w-md mx-auto">
            <div class="flex justify-between mb-4">
              <span class="bg-[#1c2f45] text-white px-4 py-2 rounded-full">No. Rek: 123456</span>
              <span class="bg-[#1c2f45] text-white px-4 py-2 rounded-full">Nama: acejezah</span>
            </div>

            <div class="bg-gray-300 border border-gray-600 rounded-lg py-4 px-2 mb-4">
              <p class="text-sm mb-2">Selesaikan pembayaran sebelum</p>
              <div id="countdown" class="text-lg font-bold bg-[#1c2f45] text-white inline-block px-4 py-2 rounded mb-2">00 : 15 : 00</div>
              <p class="text-sm">Batas Waktu: <span id="deadline-text">--</span></p>
            </div>

            <button type="button" class="w-full bg-[#1c2f45] text-white py-3 font-semibold rounded hover:bg-[#163047]">
              Selanjutnya
            </button>
        </div>

        <!-- Script Show/Hide & Timer -->
        <script>
            document.querySelector('select[name="metode"]').addEventListener('change', function () {
              const bniForm = document.getElementById('bni-form');
              if (this.value === 'bni') {
                bniForm.classList.remove('hidden');
                startCountdown();
              } else {
                bniForm.classList.add('hidden');
              }
            });

            function startCountdown() {
              let duration = 15 * 60;
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

        <!-- Upload Bukti Pembayaran -->
        <div class="flex items-center justify-between bg-gray-400 text-white rounded px-4 py-3">
            <label for="file" class="font-bold">Pilih File</label>
            <input type="file" name="bukti" id="file" class="text-sm text-white" required />
        </div>

        <!-- Tombol Submit -->
        <button type="submit" name="konfirmasi" class="w-full bg-green-700 text-white py-3 font-bold rounded hover:bg-green-800">
            *Unggah & Konfirmasi Pembayaran*
        </button>
    </form>
</section>
