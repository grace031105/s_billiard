@extends('layouts.detail')

@section('title', 'Detail Penyewaan')

@section('content')
<h1 class="text-center text-3xl font-bold text-[#1c2f45] mb-10">Detail Penyewaan</h1>

{{--  DATA PELANGGAN --}}
<section class="bg-[#1c2f45] text-white p-6 rounded-lg mb-8">
    <h2 class="text-2xl font-bold mb-4">Data Pelanggan</h2>
    <div class="grid grid-cols-2 gap-4">
        <p>Nama : {{ $nama ?? '-' }}</p>
        <p>Email : {{ $email ?? '-' }}</p>
    </div>
</section>

{{--  DATA PENYEWAAN --}}
<section class="bg-[#1c2f45] text-white p-6 rounded-lg mb-8">
    <h2 class="text-2xl font-bold mb-4">Data Penyewaan</h2>
    <div class="grid grid-cols-2 gap-4">
        {{-- ⚡ Sekarang ambil Tipe Meja dari Relasi --}}
        <p>Tipe Meja : {{ $meja->tipe_meja ?? '-' }}</p>
        <p>Tanggal : {{ $tanggal ?? '-' }}</p>
        <p>Jam : {{ $jam ?? '-' }}</p>
        <p>No Meja : {{ $meja->nomor_meja ?? '-' }}</p>
    </div>
    <hr class="my-4 border-white/50" />
    <div class="grid grid-cols-2 text-lg font-medium">
        <p>Subtotal : Rp {{ number_format($subtotal ?? 0, 0, ',', '.') }}</p>
        <p>Total Akhir : Rp {{ number_format($total_akhir ?? 0, 0, ',', '.') }}</p>
    </div>
</section>

<div class="text-center mb-10">
    < <a href="{{ route('resi_pemesanan') }}" class="block bg-slate-300 text-black font-bold py-2 rounded"><button class="bg-[#1c2f45] text-white px-8 py-3 rounded-full font-semibold text-lg shadow-md hover:bg-[#163047]">
        ↓ Pembayaran ↓
    </button></a>
</div>

{{--  FORM PEMBAYARAN --}}
@include('components.form_pembayaran', ['total_akhir' => $total_akhir])

@endsection
