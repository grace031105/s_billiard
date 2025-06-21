@extends('layouts.meja1')

@section('title', 'Meja Reguler - Forcue')

@section('content')
<div class="container mx-auto px-4 py-6">
  <a href="{{ url()->previous() }}" class="text-blue-900 font-semibold">&larr; Kembali</a>

  <div class="meja-detail flex flex-wrap gap-6 my-6">
    <img src="{{ asset('/images/gambar4.jpeg') }}" alt="Meja Biliar" class="max-w-md rounded-xl">
    <div class="flex-1">
      <h2 class="text-3xl font-bold text-[#1c2a41] mb-2">Meja Reguler</h2>
      <p class="text-[#333] leading-relaxed">
        Meja biliar standar berukuran 7ft, cocok untuk permainan santai maupun harian. Menawarkan pengalaman bermain yang nyaman dengan perawatan rutin dan fasilitas memadai.
      </p>
    </div>
  </div>

  <h2 class="text-2xl font-bold text-[#1c2a41] mb-4">Daftar Meja</h2>
  <div class="space-y-4">
    @foreach ($meja_reguler as $meja)
      <div class="bg-[#1c2a41] text-white rounded-lg p-4">
        <div class="flex items-center justify-between gap-4">
          <div class="flex items-center gap-4">
            <!-- FOTO MEJA -->
            <img src="{{ asset('images/' . $meja->foto_meja) }}" alt="Foto Meja" class="w-20 h-20 object-cover rounded">
            <!-- NAMA MEJA -->
            <h2 class="text-lg font-semibold">{{ $meja->nama_meja }}</h2>
          </div>
          <!-- TOMBOL PILIH JADWAL (membuka modal) -->
          <button 
            type="button"
            onclick="openModal('modal-{{ $meja->id_meja }}')"
            class="bg-white text-[#1c2a41] px-4 py-2 rounded font-semibold">
            Pilih Jadwal
          </button>
        </div>

        <!-- MODAL -->
        <div id="modal-{{ $meja->id_meja }}" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
          <div class="bg-[#b0c4de] rounded-2xl w-full max-w-xl p-6 relative">
            <button onclick="closeModal('modal-{{ $meja->id_meja }}')" class="absolute top-2 right-4 text-2xl font-bold text-gray-700 hover:text-black">&times;</button>
    
            <h2 class="text-2xl font-bold text-center text-[#1c2a41] mb-6">Formulir Reservasi</h2>

            <form method="POST" action="{{ route('details') }}">
              @csrf
              <input type="hidden" name="id_meja" value="{{ $meja->id_meja }}">
              <input type="hidden" name="nama_meja" value="{{ $meja->nama_meja }}">
              <input type="hidden" name="harga" value="{{ $meja->harga_per_jam ?? 0 }}">

              <div class="mb-4">
                <label class="block mb-1">Tanggal</label>
                <input type="date" name="tanggal" required class="w-full rounded p-2 text-black">
              </div>
              <!--waktu grid-->
              
              <label class="block mb-2">Waktu</label>
                <div class="grid grid-cols-3 gap-2 mb-4">
                  @foreach ($waktu_sewas as $waktu)
                    <label class="cursor-pointer">
                      <input type="radio" name="id_waktu" value="{{ $waktu->id_waktu }}" class="hidden peer" required>
                      <div class="peer-checked:bg-white peer-checked:text-[#1c2a41] bg-[#1c2a41] text-white rounded p-2 text-center">
                        {{ $waktu->jam_mulai }} - {{ $waktu->jam_selesai }}
                      </div>
                    </label>
                  @endforeach
                </div>

                <div class="bg-white text-[#1c2a41] rounded p-2 mb-4 text-sm">
                  <p><strong>Tipe Meja:</strong> Meja Reguler</p>
                  <p><strong>No Meja:</strong> {{ $meja->nama_meja }}</p>
                </div>

                <button type="submit" class="w-full bg-[#1c2a41] text-white px-4 py-2 rounded font-semibold">Tambah ke Keranjang</button>
              </form>
            </div>
          </div>

        </div>
      @endforeach
    </div>
  </div>
  @endsection
  <script>
  function openModal(id) {
    document.getElementById(id).classList.remove('hidden');
  }

  function closeModal(id) {
    document.getElementById(id).classList.add('hidden');
  }

  function updateDisabledTimes(idMeja, tanggal, bookedData) {
    // Loop semua slot yang ada
    for (const idWaktu in bookedData) {
      const waktuArray = bookedData[tanggal] || [];

      @foreach ($waktu_sewas as $waktu)
        const waktuId = {{ $waktu->id_waktu }};
        const radio = document.getElementById('slot-' + idMeja + '-' + waktuId);
        const label = document.getElementById('slot-' + idMeja + '-' + waktuId + '-label');

        if (radio && label) {
          if (waktuArray.includes(waktuId)) {
            radio.disabled = true;
            label.classList.add('opacity-50', 'cursor-not-allowed', 'bg-gray-400');
          } else {
            radio.disabled = false;
            label.classList.remove('opacity-50', 'cursor-not-allowed', 'bg-gray-400');
          }
        }
      @endforeach
    }
  }
</script>


