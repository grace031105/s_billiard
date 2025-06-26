@extends('layouts.reservasi')

@section('title', 'Data Reservasi')

@section('sidebar')
<aside class="w-64 h-screen bg-slate-700 text-white pt-4">
    <ul class="space-y-2 px-4">
        <li><a href="beranda" class="flex items-center p-2 rounded bg-slate-800 hover:bg-slate-600"><i class="fas fa-home mr-3"></i> Beranda</a></li>
        <li><a href="reservasi" class="flex items-center p-2 rounded bg-slate-800 hover:bg-slate-600"><i class="fas fa-chart-bar mr-3"></i> Data Reservasi</a></li>
        <li><a href="kelola_meja" class="flex items-center p-2 rounded bg-slate-800 hover:bg-slate-600"><i class="fas fa-table mr-3"></i> Kelola Meja</a></li>
        <li><a href="pelanggan" class="flex items-center p-2 rounded bg-slate-800 hover:bg-slate-600"><i class="fas fa-users mr-3"></i> Pelanggan</a></li>
    </ul>
</aside>
@endsection

@section('content')
<h3 class="text-2xl font-bold mb-2"><i class="fas fa-chart-bar mr-3"></i>Data Reservasi Meja Billiard</h3>
<hr class="border-white mb-4">

<table class="w-full text-sm text-left text-gray-900 bg-white rounded-lg shadow overflow-hidden">
    <thead class="bg-blue-300 text-black">
        <tr>
            <th class="px-4 py-2">NO</th>
            <th class="px-4 py-2">KODE</th>
            <th class="px-4 py-2">PELANGGAN</th>
            <th class="px-4 py-2">MEJA</th>
            <th class="px-4 py-2">TIPE</th>
            <th class="px-4 py-2">MULAI</th>
            <th class="px-4 py-2">SELESAI</th>
            <th class="px-4 py-2">TOTAL</th>
            <th class="px-4 py-2">BUKTI BAYAR</th>
            <th class="px-4 py-2">STATUS</th>
            <th class="px-4 py-2">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservasih as $index => $reservasi)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $index + 1 }}</td>
            <td class="px-4 py-2">{{ $reservasi->kode_reservasi }}</td>
            <td class="px-4 py-2">{{ $reservasi->pelanggan->nama_pengguna }}</td>
            <td class="px-4 py-2">{{ $reservasi->meja->nama_meja }}</td>
            <td class="px-4 py-2">{{ $reservasi->meja->tipe_meja }}</td>
            <td class="px-4 py-2">{{ optional($reservasi->waktu)->jam_mulai ?? '-' }}</td>
            <td class="px-4 py-2">{{ optional($reservasi->waktu)->jam_selesai ?? '-' }}</td>
            <td class="px-4 py-2">Rp {{ number_format($reservasi->total_harga, 0, ',', '.') }}</td>
            <td class="px-4 py-2">
                @if ($reservasi->transaksi && $reservasi->transaksi->bukti_pembayaran)
                    <img src="{{ asset('storage/' . $reservasi->transaksi->bukti_pembayaran) }}" alt="Bukti" class="w-24 h-auto rounded shadow">
                @else
                    <span class="italic text-gray-500">Belum Upload</span>
                @endif
            </td>
            <td class="px-4 py-2">
                @switch($reservasi->status)
                    @case('sudah_bayar')
                        <span class="text-green-600 font-bold">Sudah Bayar</span>
                        @break
                    @case('menunggu_konfirmasi')
                        <span class="text-yellow-500 font-semibold">Menunggu Konfirmasi</span>
                        @break
                    @case('dibatalkan')
                        <span class="text-red-500 font-semibold">Dibatalkan</span>
                        @break
                    @default
                        <span class="text-gray-500">Status Lain</span>
                @endswitch
            </td>
            <td class="px-4 py-2 space-y-1">
                <form action="{{ route('reservasi.konfirmasi', $reservasi->id_reservasi) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Konfirmasi</button>
                </form>

                <form action="{{ route('reservasi.batal', $reservasi->id_reservasi) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Batal</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
