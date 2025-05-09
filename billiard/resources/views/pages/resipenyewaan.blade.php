@extends('layouts.resi')

@section('title', 'Resi Penyewaan')

@section('content')
  <h1 class="text-2xl font-bold text-center mb-6">Resi Penyewaan</h1>
    
  <div class="bg-[#2D506D] text-white rounded-2xl p-8 space-y-4">
    <div class="flex justify-center mb-4">
      <img src="/images/gambar3.png" alt="Logo" class="h-14">
    </div>

    <div class="space-y-2 text-sm">
      <div class="border-b border-white pb-2"><span class="font-bold">Kode Resi:</span> #RESI001</div>
      <div class="border-b border-white pb-2"><span class="font-bold">Nama Pelanggan:</span> Budi</div>
      <div class="border-b border-white pb-2"><span class="font-bold">Tipe Meja:</span> VIP</div>
      <div class="border-b border-white pb-2"><span class="font-bold">No Meja:</span> 4</div>
      <div class="border-b border-white pb-2"><span class="font-bold">Tanggal:</span> 2025-05-06</div>
      <div class="border-b border-white pb-2"><span class="font-bold">Waktu:</span> 15:00 - 17:00</div>
      <div class="border-b border-white pb-2"><span class="font-bold">Total Harga:</span> Rp 100.000</div>
    </div>

    <div class="pt-4">
      <button class="w-full border-2 border-white rounded-full py-2 font-bold">Simpan sebagai PDF</button>
    </div>
  </div>
@endsection
