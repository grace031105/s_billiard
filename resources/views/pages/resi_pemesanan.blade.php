@extends('layouts.resi')

@section('title', 'Resi Pemesanan')

@section('content')
<h1 class="text-3xl font-bold text-center mb-8">Resi Pemesanan</h1>

<div class="bg-[#2D506D] text-white rounded-2xl p-8 space-y-6 shadow-xl max-w-lg mx-auto">
    <div class="flex justify-center mb-6">
        <img src="/images/gambar3.png" alt="Logo" class="h-16">
    </div>

    <div class="space-y-10 text-sm"> {{-- ditambah space-y-10 untuk jarak antar reservasi --}}
        @foreach ($reservasiList as $reservasi)
            <div class="space-y-4"> {{-- pembungkus satu reservasi --}}
                @php
                    $pelanggan = $reservasi->pelanggan ?? null;
                @endphp

                @if($pelanggan)
                    <div class="border-b border-white pb-2">
                        <span class="font-bold">Nama Pelanggan:</span>
                        <span>{{ $pelanggan->nama_pengguna }}</span>
                    </div>
                @else
                    <div class="border-b border-white pb-2">
                        <span class="font-bold">Nama Pelanggan:</span>
                        <span>Tidak ditemukan</span>
                    </div>
                @endif

                <div class="border-b border-white pb-2">
                    <span class="font-bold">Kode Reservasi:</span>
                    <span>{{ $reservasi->kode_reservasi }}</span>
                </div>

                <div class="border-b border-white pb-2">
                    <span class="font-bold">Tipe Meja:</span>
                    <span>{{ $reservasi->meja->kategori->nama_kategori ?? '-' }}</span>
                </div>

                <div class="border-b border-white pb-2">
                    <span class="font-bold">Nama Meja:</span>
                    <span>{{ $reservasi->meja->nama_meja }}</span>
                </div>

                <div class="border-b border-white pb-2">
                    <span class="font-bold">Tanggal:</span>
                    <span>{{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->locale('id')->translatedFormat('l, d F Y') }}</span>
                </div>

                <div class="border-b border-white pb-2">
                    <span class="font-bold">Waktu:</span>
                    <span>
                        {{ $reservasi->waktu ? \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->waktu->jam_mulai)->format('H:i') . ' - ' . \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->waktu->jam_selesai)->format('H:i') : '-' }}
                    </span>
                </div>

                <div class="border-b border-white pb-2">
                    <span class="font-bold">Total Harga:</span>
                    <span>Rp {{ number_format($reservasi->total_harga, 0, ',', '.') }}</span>
                </div>
            </div>
        @endforeach

        @if ($transaksi)
            <div class="border-b border-white pb-2">
                <span class="font-bold">Metode Pembayaran:</span>
                <span>{{ $transaksi->metode_pembayaran }}</span>
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
