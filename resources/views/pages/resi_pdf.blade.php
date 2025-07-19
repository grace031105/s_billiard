@extends('layouts.pdf')

@section('title', 'Resi Pemesanan')

@section('content')
<h1 style="text-align: center; font-size: 28px; font-weight: 700; margin-bottom: 30px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    Resi Pemesanan
</h1>

@foreach ($reservasiList as $reservasi)
<div style="background-color: #2D506D; color: white; border-radius: 16px; padding: 40px 35px; max-width: 600px; margin: 0 auto; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; box-shadow: 0 4px 12px rgba(0,0,0,0.3);">
    
    <table style="width: 100%; color: white; border-collapse: separate; border-spacing: 0 12px; font-size: 16px;">
        <tbody>
            <tr>
                <td style="width: 35%; text-align: right; padding-right: 15px; font-weight: 600; vertical-align: top;">
                    Kode Reservasi:
                </td>
                <td style="vertical-align: top; text-align: left;">{{ $reservasi->kode_reservasi }}</td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 15px; font-weight: 600; vertical-align: top;">
                    Nama Pelanggan:
                </td>
                <td style="vertical-align: top; text-align: left;">{{ $reservasi->pelanggan->nama_pengguna }}</td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 15px; font-weight: 600; vertical-align: top;">
                    Tipe Meja:
                </td>
                <td style="vertical-align: top; text-align: left;">{{ $reservasi->meja->kategori->nama_kategori ?? '-' }}</td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 15px; font-weight: 600; vertical-align: top;">
                    No Meja:
                </td>
                <td style="vertical-align: top; text-align: left;">{{ $reservasi->meja->nama_meja }}</td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 15px; font-weight: 600; vertical-align: top;">
                    Tanggal:
                </td>
                <td style="vertical-align: top; text-align: left;">
                     {{ \Carbon\Carbon::parse($reservasi->tanggal_reservasi)->locale('id')->translatedFormat('l, d F Y') }}
                </td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 15px; font-weight: 600; vertical-align: top;">
                    Waktu:
                </td>
                <td style="vertical-align: top; text-align: left;">{{ $reservasi->waktu ? \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->waktu->jam_mulai)->format('H:i') . ' - ' . \Carbon\Carbon::createFromFormat('H:i:s', $reservasi->waktu->jam_selesai)->format('H:i') : '-' }}</td>
            </tr>
            <tr>
                <td style="text-align: right; padding-right: 15px; font-weight: 600; vertical-align: top;">
                    Total Harga:
                </td>
                <td style="vertical-align: top; font-weight: 700; text-align: left;">
                     Rp {{ number_format($reservasi->total_harga, 0, ',', '.') }}
                </td>
            </tr>
        </tbody>
    </table>

</div>
@endforeach
<p style="text-align: center; margin-top: 40px; font-size: 12px; color: #ccc; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
    &copy; 2025 Forcue. All rights reserved.
</p>
