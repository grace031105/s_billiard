@extends('layouts.meja2')

@section('title', 'Meja VIP Forcue')

@section('content')
<div class="container mx-auto px-4 py-6">
  <a href="{{ route('dash') }}" class="text- [#1E293B] font-semibold flex items-center gap-2 hover:underline">
  <i class="fa-solid fa-chevron-left"></i>
  Kembali
</a>

  <!-- Detail Meja -->
  <div class="meja-detail flex flex-wrap gap-6 my-6">
    <img src="{{ asset('/images/gambar5.jpeg') }}" alt="Meja Biliar" class="max-w-md rounded-xl">
    <div class="flex-1">
      <h2 class="text-3xl font-bold text-[#1c2a41] mb-2">Meja Vip</h2>
      <p class="text-[#333] leading-relaxed">
       Meja VIP berukuran 8ft menawarkan ruang bermain yang lebih luas dengan kenyamanan ekstra. Dilengkapi sofa empuk, pencahayaan terang, dan suasana eksklusif untuk pengalaman bermain yang lebih premium.</p>
    </div>
  </div>


  <!-- Daftar Meja -->
  <div class="daftar-meja">
    <h2 class="text-2xl font-bold text-[#1c2a41] mb-4">Daftar Meja</h2>
    <div class="space-y-4">
      @foreach($mejaList as $meja)
<div class="flex items-center gap-4 p-4 bg-[#1D3C5C] rounded-xl text-white">
  <img src="{{ asset($meja->gambar ?? 'images/gambar5.jpeg') }}" alt="{{ $meja->nama_meja }}" class="w-24 h-24 object-cover rounded-md" />
    <div class="flex flex-col">
    <div class="font-semibold text-xl">{{ $meja->nama_meja }}</div>
  </div>

  {{-- Tombol Pilih Jadwal --}}
  <button class="ml-auto px-4 py-2 bg-white text-black rounded-full font-semibold"
      onclick="openPopup('VIP', '{{ $meja->nama_meja }}', 1)">Pilih Jadwal</button>


</div>
@endforeach
    </div>
  </div>
</div>

<!-- Aturan Venue -->
<div class="container mx-auto px-4 mt-10">
  <div class="bg-[#D7E6F4] p-6 rounded-xl text-[#1E293B] text-lg"> {{-- tambah text-lg di sini --}}
    <h3 class="text-2xl font-bold mb-4">Aturan Venue</h3>
    <p class="mb-2">Buka setiap hari dari jam <strong>11:00 - 03:00 WIB</strong></p>
    <p class="mb-4">Dilarang Merokok di dalam ruangan</p>

    <h4 class="text-xl font-bold mb-2">Fasilitas</h4>
    <ul class="list-none space-y-2">
  <li class="flex items-center gap-2">
    <i class="fa-solid fa-cookie-bite text-[#1E3A5F]"></i>
    Jual Makanan Ringan
  </li>
  <li class="flex items-center gap-2">
    <i class="fa-solid fa-mug-hot text-[#1E3A5F]"></i>
    Jual Minuman
  </li>
  <li class="flex items-center gap-2">
    <i class="fa-solid fa-motorcycle text-[#1E3A5F]"></i>
    Parkir Motor
  </li>
  <li class="flex items-center gap-2">
    <i class="fa-solid fa-car text-[#1E3A5F]"></i>
    Parkir Mobil
  </li>
  <li class="flex items-center gap-2">
    <i class="fa-solid fa-toilet text-[#1E3A5F]"></i>
    Toilet
  </li>
</ul>

  </div>
</div>

@if ($mejaTerpilihId)
<script>
    window.onload = function() {
        window.waktuList = @json($waktuList);
        openPopup("VIP", "{{ $mejaTerpilih }}", {{ $mejaTerpilihId }});
    };
</script>
@endif

<script>
function openPopup(tipe, nama, id) {
    const popup = document.getElementById('popup'); // GANTI KE 'popup'
    if (popup) {
        popup.classList.remove('hidden');
        console.log("Popup dibuka:", tipe, nama, id);
    } else {
        console.error("Elemen popup tidak ditemukan");
    }
}
</script>

<!-- Popup Form -->
@include('components.popup_form')
@include('components.schedule_popup')
@endsection

