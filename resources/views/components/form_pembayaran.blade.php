@php
  $id_reservasi = $reservasi->id_reservasi ?? null;
@endphp

<section class="bg-[#1c2f45] text-white p-6 rounded-lg mb-12">
  <h2 class="text-2xl font-bold mb-6">Selesaikan Pembayaran</h2>
  
  <p class="text-center mb-2 text-lg">Lakukan pembayaran sebesar</p>
  <p class="text-center font-bold text-red-500 text-2xl bg-gray-100 text-black inline-block px-6 py-2 rounded mb-4">
    Rp. {{ number_format($total_biaya ?? 0, 0, ',', '.') }}
  </p>

  <p class="text-center text-sm mb-2">
    Setelah melakukan pembayaran, silakan upload bukti pembayaran untuk mengkonfirmasi pesanan Anda.
  </p>
  <p class="text-center text-sm mb-6">
    Jika pesanan sudah dikonfirmasi, maka pesanan Anda akan terjadwal.
  </p>

  {{-- Alert jika ada pesan session --}}
  @if (session('status'))
    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 rounded">
      {{ session('status') }}
    </div>
  @endif

  {{-- Jika ada id_reservasi, tampilkan form --}}
  @if ($id_reservasi)
  <form method="POST" action="{{ route('pembayaran.konfirmasi', ['id_reservasi' => $id_reservasi]) }}" enctype="multipart/form-data" class="space-y-6">
    @csrf

    {{-- Hidden Fields --}}
    <input type="hidden" name="id_reservasi" value="{{ $id_reservasi }}">
    <input type="hidden" name="total_biaya" value="{{ $total_biaya ?? 0 }}">

    {{-- Metode Pembayaran --}}
    <select name="metode" required class="w-full p-3 rounded bg-gray-300 text-black">
      <option disabled selected>Pilih Metode Pembayaran</option>
      <option value="bni">BNI</option>
    </select>

    {{-- Info Rekening & Timer --}}
    <div id="bni-form" class="hidden bg-[#2e3b55] p-6 rounded-xl mt-6 text-white max-w-md mx-auto shadow-lg space-y-6">

      {{-- Info Rekening --}}
      <div class="flex justify-between items-center bg-[#1c2f45] px-4 py-3 rounded-lg text-sm font-medium">
        <div>No. Rekening: <span class="font-bold text-yellow-400">123456</span></div>
        <div>Nama: <span class="font-bold text-yellow-400">acejezah</span></div>
      </div>

      {{-- Countdown Timer --}}
      <div class="bg-[#3e4c68] p-4 rounded-lg text-center space-y-2 shadow-inner">
        <p class="text-sm text-gray-300">Selesaikan pembayaran sebelum</p>
        <div id="countdown" class="text-2xl font-bold text-yellow-300 tracking-wide">00 : 15 : 00</div>
        <p class="text-sm text-gray-400">Batas Waktu: <span id="deadline-text" class="italic">--</span></p>
      </div>

      {{-- Tombol Selanjutnya --}}
      <button type="button" class="w-full bg-yellow-400 text-[#1c2f45] font-bold py-2 rounded hover:bg-yellow-300 transition">
        Selanjutnya
      </button>
    </div>

    {{-- Upload Bukti --}}
    <div class="flex items-center justify-between bg-gray-400 text-white rounded px-4 py-3">
      <label for="file" class="font-bold">Pilih File</label>
      <input type="file" name="bukti_pembayaran" id="file" class="text-sm text-white" required />
    </div>

    {{-- Submit --}}
    <button type="submit" class="w-full bg-green-700 text-white py-3 font-bold rounded hover:bg-green-800" onclick="return confirm('Yakin ingin konfirmasi?')">
      Konfirmasi
    </button>
  </form>

  {{-- Else: ID tidak tersedia --}}
  @else
    <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
      <strong>❌ Gagal menyiapkan form pembayaran.</strong><br>
      ID Reservasi tidak tersedia.
    </div>
  @endif
</section>

{{-- Script untuk countdown dan toggle --}}
<script>
  document.querySelector('select[name="metode"]')?.addEventListener('change', function () {
    const bniForm = document.getElementById('bni-form');
    if (this.value === 'bni') {
      bniForm.classList.remove('hidden');
      startCountdown();
    } else {
      bniForm.classList.add('hidden');
    }
  });

  function startCountdown() {
    let duration = 2 * 60;
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

  // Panggil server untuk batalkan reservasi
  fetch('/reservasi/batalkan/{{ $id_reservasi }}', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}'
    }
  }).then(res => res.json())
    .then(data => {
      alert("⏰ Waktu anda habis, pesanan dibatalkan! silahkan memesan ulang");
      window.location.href = "/dash"; // Redirect ke dashboard atau halaman lain
    });
}
    }, 1000);
  }
</script>
