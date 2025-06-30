
  @extends('layouts.meja1')

@section('title', 'Meja Reguler- Forcue')

@section('content')
<div class="container mx-auto px-4 py-6">
  <a href="#" class="text-blue-900 font-semibold">&larr; Kembali</a>

  <!-- Detail Meja -->
  <div class="meja-detail flex flex-wrap gap-6 my-6">
    <img src="{{ asset('/images/gambar4.jpeg') }}" alt="Meja Biliar" class="max-w-md rounded-xl">
    <div class="flex-1">
      <h2 class="text-3xl font-bold text-[#1c2a41] mb-2">Meja Reguler</h2>
      <p class="text-[#333] leading-relaxed">
        Meja biliar standar berukuran 7ft, cocok untuk permainan santai maupun harian. Menawarkan pengalaman bermain yang nyaman dengan perawatan rutin dan fasilitas memadai.</p>
    </div>
  </div>

  <!-- Daftar Meja -->
  <div class="daftar-meja">
    <h2 class="text-2xl font-bold text-[#1c2a41] mb-4">Daftar Meja</h2>
    <div class="space-y-4">
      @foreach($mejaList as $meja)
<div class="flex items-center gap-4 p-4 bg-[#0e0e3e] rounded-xl text-white">
  <img src="{{ asset($meja->gambar ?? 'images/gambar4.jpeg') }}" alt="{{ $meja->nama_meja }}" class="w-24 h-24 object-cover rounded-md" />
    <div class="flex flex-col">
    <div class="font-semibold text-xl">{{ $meja->nama_meja }}</div>
    <!--<div class="text-sm mt-1">
      Status:
      @if($meja->status_meja == 'disewakan')
        <span class="text-red-400 font-medium">Disewakan</span>
      @elseif($meja->status_meja == 'tersedia')
        <span class="text-green-400 font-medium">Tersedia</span>
      @else
        <span class="text-yellow-400 font-medium">{{ ucfirst($meja->status_meja) }}</span>
      @endif
    </div>-->
  </div>

  {{-- Tombol Pilih Jadwal --}}
  <button class="ml-auto px-4 py-2 bg-white text-black rounded-full font-semibold"
      onclick="openPopup('Reguler', '{{ $meja->nama_meja }}', 1)">Pilih Jadwal</button>

</div>
@endforeach
    </div>
  </div>
</div>

<!-- Popup Form -->
@include('components.popup_form')
@endsection


@push('scripts')
<script>
  let selectedTimes = [];
  let tipeMejaAktif = "Reguler";
  let noMeja = "Meja 1";
  let jumlahOrang = 1;

  const hargaMeja = {
    "Reguler": 30000,
    "VIP": 60000,
    "Platinum": 90000
  };

  function openPopup(tipe, meja, orang = 1) {
    tipeMejaAktif = tipe;
    noMeja = meja;
    jumlahOrang = orang;

    document.getElementById("tipeMejaTampil").innerText = tipe;
    document.getElementById("noMeja").innerText = meja;
    document.getElementById("jumlahOrangInput").value = jumlahOrang;
    document.getElementById("hargaPerJamTampil").innerText = "-";
    document.getElementById("subtotalTampil").innerText = "-";

    // Reset jam
    selectedTimes = [];
    document.querySelectorAll('.time-buttons button').forEach(btn => {
      btn.classList.remove("bg-blue-500", "text-white");
      btn.classList.add("bg-white", "text-[#1c2a41]");
    });

    document.getElementById("popup").classList.remove("hidden");
    document.getElementById("popup").classList.add("flex");

    // 🧠 Penting! Update harga langsung!
    updateSubtotal();
  }

  function closePopup() {
    document.getElementById("popup").classList.add("hidden");
    document.getElementById("popup").classList.remove("flex");
  }

  function selectTime(button) {
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
    const harga = hargaMeja[tipeMejaAktif] ?? 0;
    const total = harga * selectedTimes.length;

    document.getElementById("hargaPerJamTampil").innerText = selectedTimes.length > 0 ? "Rp " + harga.toLocaleString("id-ID") : "-";
    document.getElementById("subtotalTampil").innerText = total > 0 ? "Rp " + total.toLocaleString("id-ID") : "-";
    document.getElementById("formSubtotal").value = total;
  }

  function updateJumlahOrang() {
    jumlahOrang = parseInt(document.getElementById("jumlahOrangInput").value) || 1;
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
    document.getElementById("formJumlahOrang").value = jumlahOrang;

    document.getElementById("formReservasi").submit();
  }

  function tambahKeKeranjang() {
    alert("Fitur belum tersedia.");
  }
</script>
@endpush
