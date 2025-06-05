@extends('layouts.pdf')

@section('title', 'Resi Pemesanan')

@section('content')
<h1 style="text-align: center; font-size: 24px; font-weight: bold; margin-bottom: 20px;">Resi Pemesanan</h1>

<div style="background-color: #2D506D; color: white; border-radius: 16px; padding: 30px; max-width: 600px; margin: 0 auto; font-family: Arial, sans-serif;">
    <div style="text-align: center; margin-bottom: 20px;">
        
    </div>

    <table style="width: 100%; color: white;">
        <tr>
            <td style="width: 30%; text-align: right; padding-right: 10px;"><strong>Kode Resi:</strong></td>
                <td>{{ $data->id_resi }}</td>
        </tr>
        <tr>
            <td style="text-align: right; padding-right: 10px;"><strong>Nama Pelanggan:</strong></td>
                <td>{{ $data->nama_pelanggan }}</td>
        </tr>
        <tr>
            <td style="text-align: right; padding-right: 10px;"><strong>Tipe Meja:</strong></td>
            <td>{{ $data->tipe_meja }}</td>
        </tr>
        <tr>
            <td style="text-align: right; padding-right: 10px;"><strong>No Meja:</strong></td>
            <td>{{ $data->no_meja }}</td>
        </tr>
        <tr>
            <td style="text-align: right; padding-right: 10px;"><strong>Tanggal:</strong></td>
            <td>{{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('l, d F Y') }}</td>
        </tr>
        <tr>
            <td style="text-align: right; padding-right: 10px;"><strong>Waktu:</strong></td>
            <td>{{ $data->waktu }}</td>
        </tr>
        <tr>
            <td style="text-align: right; padding-right: 10px;"><strong>Total Harga:</strong></td>
            <td>{{ $data->total_harga }}</td>
        </tr>
    </table>

</div>

<p style="text-align: center; margin-top: 30px; font-size: 12px;">&copy; 2025 Forcue. All rights reserved.</p>
@endsection
