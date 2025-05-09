@extends('layouts.dashboard')

@section('title', 'Reservasi Meja')

@section('content')
<section class="relative bg-cover bg-center h-[700px]" style="background-image: url('{{ asset('FORCUE.png') }}');">
  <div class="absolute inset-0 bg-black bg-opacity-60 flex items-start justify-start px-6 md:px-20 pt-32">
    <div class="text-white space-y-4 animate-fadeInLeft max-w-xl">
      <h1 class="text-5xl font-bold">CHALLENGE ACCEPTED!<br />SIAP ADU SKILL DI MEJA BILLIARD?</h1>
      <p>Klik tombol di bawah untuk reservasi meja billiard.</p>
      <a href="#pilih-meja" class="inline-block mt-4 px-6 py-2 bg-cyan-400 hover:bg-cyan-500 text-black font-bold rounded">Pesan Sekarang</a>
    </div>
  </div>
</section>

<section id="pilih-meja" class="py-20 text-center bg-[#9EB0C2]">
  <h2 class="text-2xl font-bold mb-10">TENTUKAN PILIHANMU</h2>
  <div class="slider-container mx-auto">
    <div class="slider-track">
      @foreach($meja as $m)
      <div class="slider-item text-white">
        <img src="{{ asset($m['src']) }}" alt="{{ $m['judul'] }}" />
        <div class="p-4">
          <h3 class="text-lg font-bold">{{ $m['judul'] }}</h3>
          <a href="{{ url($m['link']) }}" class="block bg-slate-300 text-black font-bold py-2 rounded mt-2">Pilih Meja</a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
