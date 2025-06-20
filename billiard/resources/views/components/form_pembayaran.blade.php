<section class="bg-[#1c2f45] text-white p-6 rounded-lg mb-12">
    <h2 class="text-2xl font-bold mb-6">Selesaikan Pembayaran</h2>
    <p class="text-center mb-2 text-lg">Lakukan pembayaran sebesar</p>
    <p class="text-center font-bold text-red-500 text-2xl bg-gray-100 text-black inline-block px-6 py-2 rounded mb-4">
        Rp. {{ number_format($total_akhir ?? 0, 0, ',', '.') }}
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

          <div class="flex items-center justify-between bg-gray-400 text-white rounded px-4 py-3">
            <label for="file" class="font-bold">Pilih File</label>
            <input type="file" name="bukti" id="file" class="text-sm text-white" />
          </div>

          <button type="submit" name="konfirmasi" class="w-full bg-green-700 text-white py-3 font-bold rounded hover:bg-green-800">
            *Unggah & Konfirmasi Pembayaran*
          </button>
        </form>
<!-- Lanjutkan dengan isi form seperti sebelumnya -->
</section>
