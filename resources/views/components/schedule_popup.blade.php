<!-- Popup Keranjang -->
<div id="schedulePanel" class="fixed top-0 right-0 w-80 bg-slate-300 h-full transform translate-x-full transition-transform duration-300 ease-in-out p-6 flex flex-col rounded-l-2xl shadow-lg z-50">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-xl font-bold">Jadwal Dipilih</h2>
    <button id="closeCart" type="button" class="text-2xl text-slate-900">&times;</button>
  </div>

  <div class="space-y-4 flex-1 overflow-y-auto" id="keranjangContainer">
    <!-- Isi keranjang akan di-render via JavaScript -->
    <p class="text-gray-600">Memuat keranjang...</p>
  </div>

  <form method="POST" action="{{ route('details') }}" id="formSchedule">
    @csrf
    <button type="submit" class="mt-6 w-full bg-slate-900 text-white font-bold py-3 rounded">
      Selanjutnya
    </button>
  </form>
</div>

<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 hidden z-40"></div>

@push('scripts')
<script>
function toggleKeranjang() {
  document.getElementById('schedulePanel')?.classList.remove('translate-x-full');
  document.getElementById('overlay')?.classList.remove('hidden');
  ambilDanTampilkanKeranjang(); // panggil isi ulang keranjang
}

function closeSchedulePopup() {
  document.getElementById('schedulePanel')?.classList.add('translate-x-full');
  document.getElementById('overlay')?.classList.add('hidden');
}

document.addEventListener("DOMContentLoaded", () => {
  document.getElementById("closeCart")?.addEventListener("click", closeSchedulePopup);
});

// Ambil data keranjang dari session (tanpa reload)
function ambilDanTampilkanKeranjang() {
  fetch("{{ url('/keranjang/data') }}")
    .then(response => response.json())
    .then(data => {
      const container = document.getElementById("keranjangContainer");
      container.innerHTML = "";

      if (data.length === 0) {
        container.innerHTML = "<p class='text-gray-600'>Belum ada jadwal di keranjang.</p>";
      } else {
        data.forEach((item, index) => {
          container.innerHTML += `
            <div class="border rounded p-4 bg-slate-200 flex justify-between items-start">
              <div class="text-sm">
                ${item.tipe_meja} - Meja ${item.no_meja}<br />
                ${item.tanggal}, ${item.jam}<br />
                Rp ${parseInt(item.subtotal).toLocaleString()}
              </div>
              <button type="button" onclick="hapusItem(${index})" class="text-red-600 text-sm hover:underline">Hapus</button>
            </div>
          `;
        });
      }
    });
}

// Hapus item dari keranjang
function hapusItem(index) {
  if (!confirm("Yakin ingin menghapus item ini?")) return;

  fetch("{{ route('keranjang.hapus') }}", {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
      'X-CSRF-TOKEN': '{{ csrf_token() }}',
      'Accept': 'application/json',
    },
    body: JSON.stringify({ index })
  })
  .then(res => res.json())
  .then(data => {
    if (data.success) {
      ambilDanTampilkanKeranjang(); // update langsung keranjang tanpa reload
    } else {
      alert("❌ Gagal menghapus item.");
    }
  })
  .catch(err => {
    console.error("❌ Error:", err);
    alert("❌ Terjadi kesalahan saat menghapus.");
  });
}
</script>
@endpush
