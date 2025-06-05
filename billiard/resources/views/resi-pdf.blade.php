<!DOCTYPE html>
<html>
<head>
    <title>Resi Penyewaan</title>
    <style>
        body { font-family: sans-serif; font-size: 14px; }
        .title { text-align: center; font-size: 18px; font-weight: bold; }
        .resi { margin-top: 20px; }
        .item { margin-bottom: 10px; }
        .label { font-weight: bold; }
    </style>
</head>
<body>
    <div class="title">Resi Penyewaan</div>

    <div class="resi">
        <div class="item"><span class="label">Kode Resi:</span> {{ $data->kode_resi }}</div>
        <div class="item"><span class="label">Nama Pelanggan:</span> {{ $data->nama_pelanggan }}</div>
        <div class="item"><span class="label">Tipe Meja:</span> {{ $data->tipe_meja }}</div>
        <div class="item"><span class="label">No Meja:</span> {{ $data->no_meja }}</div>
        <div class="item"><span class="label">Tanggal:</span> {{ \Carbon\Carbon::parse($data->tanggal)->translatedFormat('l, d F Y') }}</div>
        <div class="item"><span class="label">Waktu:</span> {{ $data->waktu }}</div>
        <div class="item"><span class="label">Total Harga:</span> {{ $data->total_harga }}</div>
    </div>
</body>
</html>
