@extends('layouts.resi')

@section('title', 'Resi Pemesanan')

@section('content')
<h1 class="text-3xl font-bold text-center mb-8">Resi Pemesanan</h1>

<div class="bg-[#2D506D] text-white rounded-2xl p-8 space-y-6 shadow-xl max-w-lg mx-auto">
    <div class="flex justify-center mb-6">
        <img src="/images/gambar3.png" alt="Logo" class="h-16">
    </div>

    <div class="space-y-4 text-sm">
        <div class="border-b border-white pb-2">
            <span class="font-bold">Kode Resi:</span> {{ $data->id_resi }}
        </div>
        <div class="border-b border-white pb-2">
            <span class="font-bold">Nama Pelanggan:</span> {{ $data->nama_pelanggan }}
        </div>
        <div class="border-b border-white pb-2">
            <span class="font-bold">Tipe Meja:</span> {{ $data->tipe_meja }}
        </div>
        <div class="border-b border-white pb-2">
            <span class="font-bold">No Meja:</span> {{ $data->no_meja }}
        </div>
        <div class="border-b border-white pb-2">
            <span class="font-bold">Tanggal:</span> {{ \Carbon\Carbon::parse($data->tanggal)->locale('id')->translatedFormat('l, d F Y') }}
        </div>
        <div class="border-b border-white pb-2">
            <span class="font-bold">Waktu:</span> {{ $data->waktu }}
        </div>
        <div class="border-b border-white pb-2">
            <span class="font-bold">Total Harga:</span> {{ $data->total_harga }}
        </div>
    </div>

    <a href="{{ route('resi.pdf', ['id' => $data->id_resi]) }}" target="_blank">
        <button class="w-full border-2 border-white rounded-full py-3 font-bold hover:bg-white hover:text-[#2D506D] transition-all duration-300">
            Simpan sebagai PDF
        </button>
    </a>
</div>

@endsection