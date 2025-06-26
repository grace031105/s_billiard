@extends('layouts.detail')

@section('title', 'Detail Penyewaan')

@section('content')
<h1 class="text-center text-3xl font-bold text-[#1c2f45] mb-10">Detail Penyewaan</h1>

<!-- Kotak besar -->
<div class="bg-[#1c2f45] text-white p-6 rounded-lg max-w-4xl mx-auto space-y-6">

    <!-- Data Pelanggan -->
    <div>
        <h2 class="text-2xl font-bold mb-4">Data Pelanggan</h2>
        <div class="grid grid-cols-2 gap-4">
            <p>Nama : {{ $nama ?? '-' }}</p>
            <p>Email : {{ $email ?? '-' }}</p>
        </div>
    </div>

    <!-- Data Penyewaan -->
    <div>
        <h2 class="text-2xl font-bold mb-4">Data Penyewaan</h2>
        <div class="grid grid-cols-2 gap-4">
            <p>Tipe Meja : {{ $tipe_meja ?? '-' }}</p>
            <p>No Meja : {{ $meja ?? '-' }}</p>
            <p>Tanggal : {{ $tanggal_reservasi ?? '-' }}</p>
            <p>Jam : {{ $jam ?? '-' }}</p>
            <p>Jumlah Orang : {{ $jumlah_orang ?? '-' }}</p>

        </div>

        <hr class="my-4 border-white/50" />
        <div class="grid grid-cols-2 text-lg font-medium">
            <p>Subtotal : Rp {{ number_format($subtotal ?? 0, 0, ',', '.') }}</p>
            <p>Total Akhir : Rp {{ number_format($total_akhir ?? 0, 0, ',', '.') }}</p>
        </div>
    </div>

    <!-- Tombol Pembayaran -->
    <div class="text-center">
        <button class="bg-white text-[#1c2f45] px-8 py-3 rounded-full font-semibold text-lg shadow-md hover:bg-gray-200">
            ↓ Pembayaran ↓
        </button>
    </div>

    <!-- Form Pembayaran -->
    <div>
        @include('components.form_pembayaran', [
            'total_akhir' => $total_akhir,
            'reservasi' => $reservasi ?? null
        ])
    </div>

</div>
@endsection
