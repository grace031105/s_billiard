@extends('layouts.meja')

@section('title', 'Kelola Meja')

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
    <h3 class="text-2xl font-bold mb-2"><i class="fas fa-table mr-3"></i>Data  Meja Billiard</h3>
    <hr class="border-white mb-4">

<!-- Judul + Tombol Tambah -->
<button data-modal-target="modalTambah" data-modal-toggle="modalTambah"
    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow mb-4">
    Tambah Data Meja
</button>

<!-- Tabel -->
<table class="w-full text-sm text-left text-gray-900 bg-white rounded-lg shadow overflow-hidden dark:bg-gray-800 dark:text-white">
    <thead class="bg-blue-300 text-black">
        <tr>
            <th class="px-4 py-2">NO</th>
            <th class="px-4 py-2">KODE</th>
            <th class="px-4 py-2">TIPE</th>
            <th class="px-4 py-2">NAMA</th>
            <th class="px-4 py-2">HARGA</th>
            <th class="px-4 py-2">FOTO</th>
            <th class="px-4 py-2">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($mejas as $index => $meja)
        <tr class="border-b">
            <td class="px-4 py-2">{{ $index + 1 }}</td>
            <td class="px-4 py-2">{{ $meja->kode_meja }}</td>
            <td class="px-4 py-2">{{ $meja->tipe_meja }}</td>
            <td class="px-4 py-2">{{ $meja->nama_meja }}</td>
            <td class="px-4 py-2">Rp{{ number_format($meja->harga_per_jam, 0, ',', '.') }}</td>
            <td class="px-4 py-2"><img src="{{ asset('images/' . $meja->foto_meja) }}" alt="Foto Meja" width="100"></td>
            <td class="flex gap-2">
                <button
                    onclick="isiFormEdit('{{ $meja->id_meja }}', '{{ $meja->kode_meja }}', '{{ $meja->nama_meja }}', '{{ $meja->tipe_meja }}', 
                    '{{ $meja->harga_per_jam }}', '{{ $meja->status_meja }}')"
                    data-modal-target="modalEdit" data-modal-toggle="modalEdit"
                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">EDIT</button>

                <form action="{{ route('mejas.delete', $meja->id_meja) }}" method="POST"
                    onsubmit="return confirm('Apakah Anda ingin menghapus data meja ini?')">
                    @csrf @method('DELETE')
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">HAPUS</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<!-- Modal Tambah -->
<div id="modalTambah" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full mx-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-start p-4 border-b rounded-t bg-gray-100 dark:bg-gray-800">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Data Meja</h3>
                <button type="button" data-modal-hide="modalTambah"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto dark:hover:bg-gray-600 dark:hover:text-white">✕</button>
            </div>
            <form method="POST" action="{{ route('meja.simpan') }}" enctype="multipart/form-data"
                class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-900 dark:text-white">
                @csrf
                <!--<div><label>Kode Meja</label><input type="text" name="kode_meja" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800" required></div>-->
                <div><label>Nama Meja</label><input type="text" name="nama_meja" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800" required></div>
                <div><label>Tipe Meja</label><input type="text" name="tipe_meja" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800" required></div>
                <div><label>Harga per Jam</label><input type="number" name="harga_per_jam" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800" required></div>
                <div class="md:col-span-2"><label>Foto Meja</label><input type="file" name="foto_meja" accept="image/*" class="w-full p-2 border rounded" required></div>
                <div class="md:col-span-2 flex justify-end gap-3 mt-4">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">Simpan</button>
                    <button type="button" data-modal-hide="modalTambah" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="modalEdit" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full mx-auto">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex justify-between items-start p-4 border-b rounded-t bg-gray-100 dark:bg-gray-800">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">Edit Data Meja</h3>
                <button type="button" data-modal-hide="modalEdit"
                    class="text-gray-400 hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto dark:hover:bg-gray-600 dark:hover:text-white">✕</button>
            </div>
            <form id="formEditMeja" method="POST" enctype="multipart/form-data"
                class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-900 dark:text-white">
                @csrf
                @method('PUT')
                <div><label>Kode Meja</label><input type="text" id="edit_kode_meja" name="kode_meja" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800" required></div>
                <div><label>Nama Meja</label><input type="text" id="edit_nama_meja" name="nama_meja" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800" required></div>
                <div><label>Tipe Meja</label><input type="text" id="edit_tipe_meja" name="tipe_meja" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800" required></div>
                <div><label>Harga per Jam</label><input type="number" id="edit_harga_per_jam" name="harga_per_jam" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800" required></div>
                <div class="md:col-span-2"><label>Ganti Foto</label><input type="file" name="foto_meja" accept="image/*" class="w-full p-2 border rounded text-gray-900 dark:text-white bg-white dark:bg-gray-800"></div>
                <div class="md:col-span-2 flex justify-end gap-3 mt-4">
                    <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-5 py-2 rounded">Update</button>
                    <button type="button" data-modal-hide="modalEdit" class="bg-red-600 hover:bg-red-700 text-white px-5 py-2 rounded">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Script: Isi Form Edit -->
<script>
    function isiFormEdit(id, kode, nama, tipe, harga, status) {
        document.getElementById('edit_kode_meja').value = kode;
        document.getElementById('edit_nama_meja').value = nama;
        document.getElementById('edit_tipe_meja').value = tipe;
        document.getElementById('edit_harga_per_jam').value = harga;
        document.getElementById('edit_status_meja').value = status;
        document.getElementById('formEditMeja').action = `/mejas/${id}`;
    }
</script>

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 rounded mt-4">{{ session('success') }}</div>
@endif

@endsection
