@extends('layouts.dashboard')
@section('title', 'Reservasi Meja')
@section('content')
<section id="beranda" class="relative bg-cover bg-center h-[700px]" style="background-image: url('/images/gambar2.png');">
  <div class="absolute inset-0 bg-black bg-opacity-60 flex items-start justify-start px-6 md:px-20 pt-32">
    <div class="text-white space-y-4 animate-fadeInLeft max-w-xl">
      <h1 class="text-4xl md:text-5xl font-bold leading-tight">
        CHALLENGE ACCEPTED!<br />SIAP ADU SKILL DI MEJA BILLIARD?
      </h1>
      <p class="text-sm md:text-base">Klik tombol di bawah untuk reservasi meja billiard.</p>
      <a href="#pilih-meja" class="relative top-6 bg-[#132B4D] text-white text-base px-6 py-2 rounded-full border-2 border-white shadow-md hover:bg-[#0f233f] transition">Pesan Sekarang</a>
    </div>
  </div>
</section>
@include('components.schedule_popup')

<section id="pilih-meja" class="py-20 text-center bg-[#C6CED5]">
  <h2 class="text-2xl font-bold mb-10">TENTUKAN PILIHANMU</h2>
  <div class="slider-container mx-auto">
    <div class="slider-track">
      @foreach($meja as $m)
       <div class="slider-item bg-[#1D3C5C] text-white rounded-2xl shadow-lg w-[280px] p-4 flex flex-col items-center rounded-[20px]">
        <img src="<?= $m['src']; ?>" alt="<?= $m['judul']; ?>" class="w-full h-full object-cover rounded-[20px]" />
        <div class="p-4 space-y-2">
          <h3 class="text-base font-bold mb-6 uppercase"><?= $m['judul']; ?></h3>
          <a href="<?= $m['link']; ?>" class="mt-15 bg-gray-200 text-gray-900 font-semibold text-sm py-2 px-6 rounded-full border-2 border-[#1E293B] hover:bg-gray-300 transition">Pilih Meja</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
