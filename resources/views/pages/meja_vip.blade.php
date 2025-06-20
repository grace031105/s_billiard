@extends('layouts.meja2')

@section('title', 'Meja VIP - Forcue')

@section('content')
<div class="container mx-auto px-4 py-6">
  <a href="#" class="text-blue-900 font-semibold">&larr; Kembali</a>

  <div class="meja-detail flex flex-wrap gap-6 my-6">
    <img src="{{ asset('/images/gambar5.jpeg') }}" alt="Meja Biliar" class="max-w-md rounded-xl">
    <div class="flex-1">
      <h2 class="text-3xl font-bold text-[#1c2a41] mb-2">Meja VIP</h2>
      <p class="text-[#333] leading-relaxed">Meja VIP berukuran 8ft menawarkan ruang bermain yang lebih luas dengan kenyamanan ekstra. Dilengkapi sofa empuk, pencahayaan terang, dan suasana eksklusif untuk pengalaman bermain yang lebih premium.</p>
    </div>
  </div>

  <div class="daftar-meja">
    <h2 class="text-2xl font-bold text-[#1c2a41] mb-4">Daftar Meja</h2>
    <div class="space-y-4">
      @foreach(['Meja 1', 'Meja 2', 'Meja 3'] as $meja)
      <div class="flex items-center gap-4 p-4 bg-[#0e0e3e] rounded-xl text-white">
        <img src="{{ asset('/images/gambar5.jpeg') }}" alt="{{ $meja }}" class="w-24 rounded-md" />
        <div class="font-semibold text-xl">{{ $meja }}</div>
        <button class="ml-auto px-4 py-2 bg-white text-black rounded-full font-semibold" onclick="openPopup('{{ $meja }}')">Pilih Jadwal</button>
      </div>
      @endforeach
    </div>
  </div>
</div>
@include('components.schedule_popup')
@include('components.popup_form')
@endsection

@push('scripts')
<script>
   // Array untuk menyimpan item keranjang
let cart = [];

// Menyimpan data yang dipilih oleh pengguna (meja dan waktu)
let selectedTime = null;
let selectedDate = null;
let meja = "Meja 1";  // Bisa diganti dinamis sesuai pilihan

// Fungsi untuk membuka pop-up (Reservasi)
function openPopup(mejaSelected) {
  meja = mejaSelected;
  document.getElementById('noMeja').innerText = meja;
  const popup = document.getElementById('popup');
  popup.classList.remove('hidden');
  popup.classList.add('flex');
}

// Fungsi untuk menutup pop-up (Reservasi)
function closePopup() {
  const popup = document.getElementById('popup');
  popup.classList.remove('flex');
  popup.classList.add('hidden');
}

// Fungsi untuk memilih waktu
function selectTime(button) {
  selectedTime = button.textContent;
  document.querySelectorAll('.time-buttons button').forEach(btn => {
    btn.classList.remove('bg-blue-500', 'text-white', 'selected');
  });
  button.classList.add('bg-blue-500', 'text-white', 'selected');
}

// Fungsi untuk menambah item ke keranjang (Schedule Panel)
function tambahKeKeranjang() {
  if (!selectedTime || !selectedDate) {
    alert('Harap pilih waktu dan tanggal terlebih dahulu.');
    return;
  }

  cart.push({
    meja: meja,
    waktu: selectedTime,
    tanggal: selectedDate
  });

  alert('Item berhasil ditambahkan ke keranjang!');
  displayCartItemsInSchedulePanel();
  closePopup();
}

// Fungsi untuk menampilkan item keranjang di schedulePanel
function displayCartItemsInSchedulePanel() {
  const cartItemsContainer = document.querySelector('#schedulePanel .space-y-4');
  cartItemsContainer.innerHTML = '';

  cart.forEach(item => {
    const cartItemDiv = document.createElement('div');
    cartItemDiv.classList.add('bg-slate-200', 'p-4', 'rounded-lg', 'text-left', 'mb-4');
    cartItemDiv.innerHTML = `
      <div class="flex justify-between items-center">
        <div><strong>Tipe Meja:</strong> ${item.meja}</div>
        <div><strong>No Meja:</strong> ${item.meja}</div>
      </div>
      <div class="mt-2">
        <strong>Tanggal:</strong> ${item.tanggal} <br>
        <strong>Waktu:</strong> ${item.waktu}
      </div>
    `;
    cartItemsContainer.appendChild(cartItemDiv);
  });

  if (cart.length > 0) {
    document.getElementById('schedulePanel').classList.remove('translate-x-full');
    document.getElementById('overlay').classList.remove('hidden');
  }
}

// Fungsi untuk memproses pembelian
function prosesPembelian() {
  alert("Proses Pembelian Diperlukan");
}

// Ambil tanggal dari input
document.getElementById('date').addEventListener('change', function () {
  selectedDate = this.value;
});

// Event listener setelah DOM siap
document.addEventListener('DOMContentLoaded', () => {
  const openCart = document.getElementById('openCart');
  const closeCart = document.getElementById('closeCart');
  const schedulePanel = document.getElementById('schedulePanel');
  const overlay = document.getElementById('overlay');
  const userBtn = document.getElementById('userBtn');
  const userDropdown = document.getElementById('userDropdown');

  if (openCart) {
    openCart.addEventListener('click', () => {
      if (cart.length > 0) {
        schedulePanel.classList.remove('translate-x-full');
        overlay.classList.remove('hidden');
      } else {
        alert('Keranjang kosong!');
      }
    });
  }

  closeCart?.addEventListener('click', () => {
    schedulePanel.classList.add('translate-x-full');
    overlay.classList.add('hidden');
  });

  overlay?.addEventListener('click', () => {
    schedulePanel.classList.add('translate-x-full');
    overlay.classList.add('hidden');
  });

  userBtn?.addEventListener('click', () => {
    userDropdown.classList.toggle('hidden');
  });
});
function displayCartItemsInSchedulePanel() {
  const cartItemsContainer = document.querySelector('#schedulePanel .space-y-4');
  cartItemsContainer.innerHTML = ''; // Clear previous items

  cart.forEach((item, index) => {
    const cartItemDiv = document.createElement('div');
    cartItemDiv.classList.add('bg-slate-200', 'p-4', 'rounded-lg', 'text-left', 'mb-4');
    cartItemDiv.innerHTML = `
      <div class="flex justify-between items-center">
        <div>
          <strong>Tipe Meja:</strong> ${item.meja}<br>
          <strong>No Meja:</strong> ${item.meja}<br>
          <strong>Tanggal:</strong> ${item.tanggal}<br>
          <strong>Waktu:</strong> ${item.waktu}
        </div>
        <button onclick="hapusItemDariKeranjang(${index})" class="text-slate-900 text-xl ml-4 hover:text-red-600">&times;</button>
      </div>
    `;
    cartItemsContainer.appendChild(cartItemDiv);
  });

  if (cart.length > 0) {
    document.getElementById('schedulePanel').classList.remove('translate-x-full');
    document.getElementById('overlay').classList.remove('hidden');
  } else {
    // Jika sudah kosong, otomatis tutup panel
    document.getElementById('schedulePanel').classList.add('translate-x-full');
    document.getElementById('overlay').classList.add('hidden');
  }
}

// Fungsi untuk menghapus item dari keranjang
function hapusItemDariKeranjang(index) {
  cart.splice(index, 1); // Hapus berdasarkan index
  displayCartItemsInSchedulePanel(); // Refresh tampilan
}
function lanjutKeDetail() {
  // Ambil data yang dibutuhkan, bisa langsung dari variabel yang ada seperti meja, waktu, tanggal
  const reservasiData = {
    meja: meja,            // Meja yang dipilih
    waktu: selectedTime,   // Waktu yang dipilih
    tanggal: selectedDate  // Tanggal yang dipilih
  };

  // Simpan data ke localStorage (atau bisa ke sessionStorage jika hanya sementara)
  localStorage.setItem('reservasiData', JSON.stringify(reservasiData));

  // Arahkan ke halaman detail
  window.location.href = "/details"; // Ganti URL sesuai rute halaman detail yang diinginkan
}

</script>
@endpush
