<div id="popup" class="fixed inset-0 hidden bg-black bg-opacity-50 z-50 justify-center items-center">
  <form id="formReservasi" method="POST" action="/details" class="bg-[#9bb1c5] p-6 rounded-2xl w-full max-w-xl text-center relative">
    @csrf
    <input type="hidden" name="tipe_meja" id="formTipeMeja">
    <input type="hidden" name="tanggal" id="formTanggal">
    <input type="hidden" name="jam" id="formJam">
    <input type="hidden" name="kode_meja" id="formKodeMeja">
    <input type="hidden" name="no_meja" id="formNoMeja">
    <input type="hidden" name="subtotal" id="formSubtotal">

    <button type="button" onclick="closePopup()" class="absolute top-2 right-4 text-xl font-bold text-[#1c2a41] hover:text-red-600">×</button>
    <h2 class="text-2xl font-bold text-[#1c2a41] mb-4">Formulir Reservasi</h2>

    <div class="flex flex-wrap gap-6 mb-6">
      <!-- Kiri -->
      <div class="flex-1 min-w-[200px]">
        <label for="date" class="block text-left">Tanggal</label>
        <input type="date" id="date" class="w-full p-2 rounded mt-1" onchange="cekJadwalTerpesan()">

        <label class="block mt-4 text-left">Waktu</label>
        <div class="grid grid-cols-3 gap-2 mt-2 time-buttons">
          @foreach ($waktuList as $waktu)
          @php
              $jamWaktu = $waktu->jam_mulai . '-' . $waktu->jam_selesai;
          @endphp
          <button
              type="button"
              data-id="{{ $waktu->id_waktu }}"
              data-value="{{ $jamWaktu }}"
              class="p-2 rounded font-medium time-button bg-white border border-gray-400 text-[#1c2a41]"
              onclick="selectTime(this)">
              {{ $jamWaktu }}
          </button>
          @endforeach
        </div>
      </div>

      <!-- Kanan -->
      <div class="flex-1 flex justify-center items-center">
        <div class="bg-gray-100 p-4 rounded-lg w-full max-w-sm">
          <div class="space-y-2 text-left text-[#1c2a41] font-semibold">
            <div><strong>Tipe Meja:</strong> <span id="tipeMejaTampil">-</span></div>
            <div><strong>No Meja:</strong> <span id="noMeja">-</span></div>
            <div><strong>Harga per Jam:</strong> <span id="hargaPerJamTampil">-</span></div>
            <div><strong>Subtotal:</strong> <span id="subtotalTampil">-</span></div>
          </div>
        </div>
      </div>
    </div>

    <button type="button" onclick="lanjutKeDetailDanKirim()" class="w-full bg-[#1f3754] text-white py-3 rounded font-bold mb-3">Reservasi Sekarang</button>
    <button type="button" onclick="tambahKeKeranjang()" class="w-full bg-[#d3d8df] text-black py-3 rounded font-bold">Tambah ke Keranjang</button>
  </form>
</div>

<script>
if (typeof selectedTimes === 'undefined') {
  var selectedTimes = [];
}
if (typeof hargaPerJam === 'undefined') {
  var hargaPerJam = 0;
}
if (typeof tipeMejaAktif === 'undefined') {
  var tipeMejaAktif = "";
}
if (typeof noMeja === 'undefined') {
  var noMeja = "";
}

const hargaMeja = {
  "Reguler": 30000,
  "VIP": 60000,
  "Platinum": 90000
};

function openPopup(tipe, meja) {
  tipeMejaAktif = tipe;
  noMeja = meja;
  hargaPerJam = hargaMeja[tipe] || 0;

  document.getElementById("popup").classList.remove("hidden");
  document.getElementById("popup").classList.add("flex");
  document.getElementById("tipeMejaTampil").innerText = tipe;
  document.getElementById("noMeja").innerText = meja;
  document.getElementById("hargaPerJamTampil").innerText = "Rp " + hargaPerJam.toLocaleString("id-ID");
  document.getElementById("formJam").value = "";
  document.getElementById("date").value = "";

  cekJadwalTerpesan();

  selectedTimes = [];
  document.querySelectorAll('.time-buttons button').forEach(btn => {
    btn.classList.remove("bg-blue-500", "text-white");
    btn.classList.add("bg-white", "text-[#1c2a41]");
  });

  updateSubtotal();
}

function selectTime(button) {
  if (button.classList.contains("dipesan")) {
    alert("❗ Maaf, meja sudah dipesan pada jam ini.");
    return;
  }

  const time = button.getAttribute('data-value');

  if (selectedTimes.includes(time)) {
    selectedTimes = selectedTimes.filter(t => t !== time);
    button.classList.remove("bg-blue-500", "text-white");
    button.classList.add("bg-white", "text-[#1c2a41]");
  } else {
    selectedTimes.push(time);
    button.classList.remove("bg-white", "text-[#1c2a41]");
    button.classList.add("bg-blue-500", "text-white");
  }

  updateSubtotal();
}

function updateSubtotal() {
  const total = hargaPerJam * selectedTimes.length;
  document.getElementById("formSubtotal").value = total;
  document.getElementById("subtotalTampil").innerText = total > 0 ? "Rp " + total.toLocaleString("id-ID") : "-";
}

function closePopup() {
  document.getElementById("popup").classList.add("hidden");
  document.getElementById("popup").classList.remove("flex");
}

function lanjutKeDetailDanKirim() {
  const tanggal = document.getElementById("date").value;
  if (!tanggal || selectedTimes.length === 0) {
    alert("Harap pilih tanggal dan minimal satu jam.");
    return;
  }

  document.getElementById("formTipeMeja").value = tipeMejaAktif;
  document.getElementById("formTanggal").value = tanggal;
  document.getElementById("formJam").value = selectedTimes.join(", ");
  document.getElementById("formNoMeja").value = noMeja;

  document.getElementById("formReservasi").submit();
}

function tambahKeKeranjang() {
  const tanggal = document.getElementById("date").value;
  const jam = selectedTimes.join(", ");
  const subtotal = hargaPerJam * selectedTimes.length;

  if (!tanggal || selectedTimes.length === 0) {
    alert("❗ Harap pilih tanggal dan minimal satu jam.");
    return;
  }

  const data = {
    tipe_meja: tipeMejaAktif,
    tanggal: tanggal,
    jam: jam,
    no_meja: noMeja,
    subtotal: subtotal,
    _token: '{{ csrf_token() }}'
  };

  fetch("{{ route('keranjang.tambah') }}", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
      "X-CSRF-TOKEN": data._token
    },
    body: JSON.stringify(data)
  })
  .then(response => response.json())
  .then(res => {
    if (res.success) {
      alert("✅ Berhasil ditambahkan ke keranjang!");
      closePopup();
    } else {
      alert("❌ Gagal menambahkan ke keranjang.");
    }
  })
  .catch(error => {
    console.error("Error:", error);
    alert("❌ Terjadi kesalahan saat mengirim data.");
  });
}

function cekJadwalTerpesan() {
  const tanggal = document.getElementById("date").value;
  const noMeja = document.getElementById("noMeja").innerText;

  if (!tanggal || !noMeja) return;

  fetch(`/cek-jadwal?tanggal=${tanggal}&no_meja=${encodeURIComponent(noMeja)}`)
    .then(res => res.json())
    .then(data => {
      const bookedWaktuIds = data.booked;

      document.querySelectorAll(".time-button").forEach(btn => {
        const idWaktu = parseInt(btn.dataset.id);
        if (bookedWaktuIds.includes(idWaktu)) {
          btn.classList.remove("bg-white", "text-[#1c2a41]");
          btn.classList.add("bg-red-400", "text-white", "cursor-not-allowed", "dipesan");
        } else {
          btn.classList.remove("bg-red-400", "text-white", "cursor-not-allowed", "dipesan");
          btn.classList.add("bg-white", "text-[#1c2a41]");
        }
      });
    })
    .catch(err => {
      console.error("❌ Gagal cek jadwal:", err);
    });
}
</script>
