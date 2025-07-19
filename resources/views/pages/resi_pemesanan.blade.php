@extends('layouts.resi')

@section('title', 'Resi Pemesanan')

@section('content')
<h1 class="text-3xl font-bold text-center mb-8">Resi Pemesanan</h1>

<div class="bg-[#2D506D] text-white rounded-2xl p-8 space-y-6 shadow-xl max-w-lg mx-auto">
    <div class="flex justify-center mb-6">
        <img src="/images/gambar3.png" alt="Logo" class="h-16">
    </div>

    @php
        $reservasi = $reservasiList->first();
        $pelanggan = $reservasi? $reservasi->pelanggan : null;
        $transaksi = $transaksi ?? null;
    @endphp
    <div class="space-y-4 text-sm">
        @if($pelanggan)
            <div class="border-b border-white pb-2">
                <span class="font-bold">Nama Pelanggan:</span> {{ $pelanggan->nama_pengguna }}
            </div>
        @else
            <div class="border-b border-white pb-2">
                <span class="font-bold">Nama Pelanggan:</span>Tidak ditemukan
            </div>
        @endif
        @foreach ($reservasiList as $reservasi)
        <div style="border-top: 3px solid white; padding-top: 20px; margin-top: 20px;">

            <div class="border-b border-white pb-2">
                <span class="font-bold">Kode Reservasi:</span> {{ $reservasi->kode_reservasi }}
            </div>
            <div class="border-b border-white pb-2">
                <span class="font-bold">Tipe Meja:</span> {{ $reservasi->meja->kategori->nama_kategori ?? '-' }}
            </div>
            <div class="border-b border-white pb-2">
                <span class="font-bold">Nama Meja:</span> {{ $reservasi->meja->nama_meja }} 
            </div>
            <div class="border-b border-white pb-2">
                <span class="font-bold">Tanggal:</span> {{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->locale('id')->translatedFormat('l, d F Y') }}
            </div>
            <div class="border-b border-white pb-2">
                <span class="font-bold">Waktu:</span> {{ $reservasi->waktu ? \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->waktu->jam_mulai)->format('H:i') . ' - ' . \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->waktu->jam_selesai)->format('H:i') : '-' }}
            </div>
            <div class="border-b border-white pb-2">
                <span class="font-bold">Total Harga:</span> Rp {{ number_format($reservasi->total_harga, 0, ',', '.') }}
            </div>
            @endforeach

            @if ($transaksi)
            <div class="border-b border-white pb-2">
                <span class="font-bold">Metode Pembayaran:</span> {{ $transaksi->metode_pembayaran }}
            </div>
            
            <div class="border-b border-white pb-2">
                <span class="font-bold">Bukti Pembayaran:</span><br>
                <img src="{{ asset('storage/' . $transaksi->bukti_pembayaran) }}" alt="Bukti Pembayaran" style="max-width: 200px;">
            </div>
            @else
                <p>Tidak ada bukti pembayaran.</p>
            @endif
        </div>

    @php
        $firstReservasi = $reservasiList->first();
    @endphp

    @if ($firstReservasi)
        <a href="{{ route('resi.pdf', ['id' => $firstReservasi->id_reservasi]) }}" target="_blank">
            <button class="w-full border-2 border-white rounded-full py-3 font-bold hover:bg-white hover:text-[#2D506D] transition-all duration-300">
                Simpan sebagai PDF
            </button>
        </a>
    @else
        <p class="text-red-500 text-sm text-center mt-4">
            Tidak dapat membuat PDF karena data reservasi tidak ditemukan.
        </p>
    @endif

</div>
@endsection
