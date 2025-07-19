@extends('layouts.pdf')

@section('title', 'Resi Pemesanan')

@section('content')
<div style="max-width: 600px; margin: 0 auto; background-color: #2D506D; color: white; border-radius: 12px; padding: 30px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
    <div style="text-align: center; margin-bottom: 25px;">
        <h2 style="font-size: 22px; font-weight: bold; letter-spacing: 1px;">Resi Pemesanan</h2>
    </div>

    @foreach ($reservasiList as $index => $reservasi)
    <table style="width: 100%; font-size: 14px; border-collapse: collapse;">
        <tbody>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">Kode Reservasi</td>
                <td>: {{ $reservasi->kode_reservasi }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">Nama Pelanggan</td>
                <td>: {{ $reservasi->pelanggan->nama_pengguna }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">Tipe Meja</td>
                <td>: {{ $reservasi->meja->kategori->nama_kategori ?? '-' }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">No Meja</td>
                <td>: {{ $reservasi->meja->nama_meja }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">Tanggal</td>
                <td>: {{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->locale('id')->translatedFormat('l, d F Y') }}</td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">Waktu</td>
                <td>: 
                    {{ $reservasi->waktu 
                        ? \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->waktu->jam_mulai)->format('H:i') . ' - ' . 
                          \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->waktu->jam_selesai)->format('H:i') 
                        : '-' 
                    }}
                </td>
            </tr>
            <tr>
                <td style="padding: 8px 0; font-weight: bold;">Total Harga</td>
                <td>: <strong>Rp {{ number_format($reservasi->total_harga, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    @if (!$loop->last)
        <div style="border-top: 1px dashed #ccc; margin: 30px 0;"></div>
    @endif
    @endforeach

    <div style="border-top: 1px dashed #ccc; margin: 40px 0 20px;"></div>

    <p style="text-align: center; font-size: 12px; color: #ccc;">&copy; 2025 Forcue. All rights reserved.</p>
</div>
@endsection
