@extends('layouts.detail')

@section('title', 'Detail Penyewaan')

@section('content')
@if(session('popup'))
    <script>
        alert("Anda akan mendapatkan resi di menu riwayat penyewaan. Resi akan diberi setelah pemilik mengkonfirmasi reservasi Anda. Mohon dicek secara berkala.");
    </script>
@endif

<h1 class="text-center text-3xl font-bold text-[#1c2f45] mb-10">Detail Penyewaan</h1>

<div class="bg-[#1c2f45] text-white p-6 rounded-lg max-w-4xl mx-auto space-y-6">

    {{-- Data Pelanggan --}}
    <div>
        <h2 class="text-2xl font-bold mb-4">Data Pelanggan</h2>
        <div class="grid grid-cols-2 gap-4">
            <p>Nama : {{ $nama ?? '-' }}</p>
            <p>Email : {{ $email ?? '-' }}</p>
        </div>
    </div>

    {{-- Data Penyewaan --}}
    <div>
        <h2 class="text-2xl font-bold my-4">Data Penyewaan</h2>

        @if(!empty($reservasiList) && is_iterable($reservasiList))
            @foreach($reservasiList as $index => $r)
<div class="mb-4 p-4 bg-[#324764] rounded">
    <h3 class="font-bold mb-2">Reservasi #{{ $index + 1 }}</h3>
    <div class="grid grid-cols-2 gap-4">
        <p>Tipe Meja : {{ $r->tipe_meja }}</p>
        <p>No Meja : {{ $r->no_meja }}</p>
        <p>Tanggal : {{ $r->tanggal_reservasi }}</p>
        <p>Jam : {{ $r->jam }}</p>
        <p>Jumlah Orang : {{ $r->jumlah_orang }}</p>
    </div>
</div>
@endforeach
        @else
            <div class="grid grid-cols-2 gap-4 bg-[#324764] p-4 rounded">
                <p>Tipe Meja : {{ $tipe_meja ?? '-' }}</p>
                <p>No Meja : {{ $meja ?? '-' }}</p>
                <p>Tanggal : {{ $tanggal_reservasi ?? '-' }}</p>
                <p>Jam : {{ $jam ?? '-' }}</p>
                <p>Jumlah Orang : {{ $jumlah_orang ?? '-' }}</p>
            </div>
        @endif

        <hr class="my-4 border-white/50" />
        <div class="grid grid-cols-2 text-lg font-medium">
            <p>Subtotal : Rp {{ number_format($subtotal ?? ($total_biaya ?? 0), 0, ',', '.') }}</p>
            <p>Total Akhir : Rp {{ number_format($total_biaya ?? ($subtotal ?? 0), 0, ',', '.') }}</p>
        </div>
    </div>

    {{-- Tombol Pembayaran --}}
    <div class="text-center">
        <button class="bg-white text-[#1c2f45] px-8 py-3 rounded-full font-semibold text-lg shadow-md hover:bg-gray-200">
            ↓ Pembayaran ↓
        </button>
    </div>

    {{-- Form Pembayaran --}}
    <div>
            @if(isset($reservasiList))
        @include('components.form_pembayaran', [
            'total_biaya' => $total_biaya ?? 0,
            'reservasiList' => $reservasiList
        ])
    @elseif(isset($reservasi))
        @include('components.form_pembayaran', [
            'total_biaya' => $reservasi->total_harga ?? 0,
            'reservasi' => $reservasi
        ])
    @else
    <div class="bg-red-100 text-red-800 px-4 py-3 mt-4 rounded">
        <strong>✘ Gagal menyiapkan form pembayaran.</strong><br>
        ID Reservasi tidak tersedia.
    </div>
@endif

    </div>

    {{-- Tombol Resi jika sudah dikonfirmasi --}}
    @if(isset($reservasi) && $reservasi->status === 'dikonfirmasi')
        <div class="text-center mt-6">
            <a href="{{ route('resi_pemesanan', ['id' => $reservasi->id_reservasi]) }}"
                class="bg-green-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-700">
                Lihat Resi
            </a>
        </div>
    @endif

</div>
@endsection
