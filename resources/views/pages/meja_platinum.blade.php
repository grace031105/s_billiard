@extends('layouts.meja3')

@section('title', 'Meja Platinum- Forcue')

@section('content')
<div class="container mx-auto px-4 py-6">
  <a href="{{ route('dash') }}" class="text- [#1E293B] font-semibold flex items-center gap-2 hover:underline">
  <i class="fa-solid fa-chevron-left"></i>
  Kembali
</a>

  <!-- Detail Meja -->
  <div class="meja-detail flex flex-wrap gap-6 my-6">
    <img src="{{ asset('/images/gambar6.jpeg') }}" alt="Meja Biliar" class="max-w-md rounded-xl">
    <div class="flex-1">
      <h2 class="text-3xl font-bold text-[#1c2a41] mb-2">Meja Platinum</h2>
      <p class="text-[#333] leading-relaxed">
        Meja Platinum merupakan pilihan terbaik dengan ukuran profesional 9ft. Dirancang untuk turnamen atau pemain berpengalaman, dilengkapi area duduk mewah, pencahayaan optimal, dan privasi lebih. Nikmati sensasi bermain kelas atas di lingkungan eksklusif.
      </p>
    </div>
  </div>

  <!-- Daftar Meja -->
  <div class="daftar-meja">
    <h2 class="text-2xl font-bold text-[#1c2a41] mb-4">Daftar Meja</h2>
    <div class="space-y-4">
      @foreach($mejaList as $meja)
<div class="flex items-center gap-4 p-4 bg-[#1D3C5C] rounded-xl text-white">
  <img src="{{ asset($meja->gambar ?? 'images/gambar6.jpeg') }}" alt="{{ $meja->nama_meja }}" class="w-24 h-24 object-cover rounded-md" />
    <div class="flex flex-col">
    <div class="font-semibold text-xl">{{ $meja->nama_meja }}</div>
  </div>

  {{-- Tombol Pilih Jadwal --}}
  <button class="ml-auto px-4 py-2 bg-white text-black rounded-full font-semibold"
      onclick="openPopup('Platinum', '{{ $meja->nama_meja }}', 1)">Pilih Jadwal</button>

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
  window.waktuList = @json($waktuList); // inject data jam ke JS global
</script>
<script>
  window.onload = function() {
    openPopup("Platinum", "{{ $mejaTerpilih }}", 1);
  };
</script>
@endif

<!-- Popup Form -->
@include('components.popup_form')
@include('components.schedule_popup')
@endsection

