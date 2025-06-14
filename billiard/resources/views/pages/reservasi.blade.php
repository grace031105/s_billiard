@extends('layouts.reservasi')

@section('title', 'Data Reservasi')

@section('sidebar')
<aside class="w-64 h-screen bg-slate-700 text-white pt-4">
    <ul class="space-y-2 px-4">
        <li>
            <a href="beranda" class="flex items-center p-2 rounded bg-slate-800 hover:bg-slate-600">
                <i class="fas fa-home mr-3"></i> Beranda
            </a>
        </li>
        <li>
            <a href="reservasi" class="flex items-center p-2 rounded bg-slate-800 hover:bg-slate-600">
                <i class="fas fa-chart-bar mr-3"></i> Data Reservasi
            </a>
        </li>
        <li>
            <a href="kelola_meja" class="flex items-center p-2 rounded bg-slate-800 hover:bg-slate-600">
                <i class="fas fa-table mr-3"></i> Kelola Meja
            </a>
        </li>
        <li>
            <a href="pelanggan" class="flex items-center p-2 rounded bg-slate-800 hover:bg-slate-600">
                <i class="fas fa-users mr-3"></i> Pelanggan
            </a>
        </li>
    </ul>
</aside>
@endsection


@section('content')
    <h3 class="text-2xl font-bold mb-2">Data Reservasi Meja Billiard</h3>
    <hr class="border-white mb-4">


    <!-- Tabel -->
    <table class="w-full text-sm text-left text-gray-900 bg-white rounded-lg shadow overflow-hidden">
        <thead class="bg-blue-300 text-black">
            <tr>
                <th class="px-4 py-2">NO</th>
                <th class="px-4 py-2">KODE RESERVASI</th>
                <th class="px-4 py-2">NAMA PELANGGAN</th>
                <th class="px-4 py-2">NAMA MEJA</th>
                <th class="px-4 py-2">TIPE MEJA</th>
                <th class="px-4 py-2">WAKTU MULAI</th>
                <th class="px-4 py-2">WAKTU SELESAI</th>
                <th class="px-4 py-2">TOTAL BIAYA</th>
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
                    <!--<td class="px-4 py-2">{{ $reservasi->tanggal_reservasi }}</td>-->
                    <td class="px-4 py-2">{{ $reservasi->waktu->jam_mulai }}</td>
                    <td class="px-4 py-2">{{ $reservasi->waktu->jam_selesai }}</td>
                    <!--<td class="px-4 py-2">{{ $reservasi->durasi_sewa }}</td>-->
                    <td class="px-4 py-2">{{ $reservasi->total_harga }}</td>
                    <td>
                        @if ($reservasi->transaksi)
                            {{ $reservasi->transaksi->bukti_pembayaran }}
                        @else
                            Belum Upload
                        @endif </td>
                    <td class="px-4 py-2">{{ $reservasi->status }}</td>
                    <td class="px-4 py-2">
                        <form action="{{ route('reservasi.konfirmasi', $reservasi->id_reservasi) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="bg-green-500 text-white px-2 py-1 rounded">Konfirmasi</button>
                        </form>

                        <form action="{{ route('reservasi.batal', $reservasi->id_reservasi) }}" method="POST" style="display:inline;">
                            @csrf
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Batal</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            
        </tbody>
    </table>
@endsection
