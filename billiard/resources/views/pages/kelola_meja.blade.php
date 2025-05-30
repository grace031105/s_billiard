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
            <a href="reservasi" class="flex items-center p-2 rounded hover:bg-slate-600">
                <i class="fas fa-chart-bar mr-3"></i> Data Reservasi
            </a>
        </li>
        <li>
            <a href="kelola_meja" class="flex items-center p-2 rounded hover:bg-slate-600">
                <i class="fas fa-table mr-3"></i> Kelola Meja
            </a>
        </li>
        <li>
            <a href="pelanggan" class="flex items-center p-2 rounded hover:bg-slate-600">
                <i class="fas fa-users mr-3"></i> Pelanggan
            </a>
        </li>
    </ul>
</aside>
@endsection

@section('content')
    <h3 class="text-2xl font-bold mb-2">Kelola Meja</h3>
    <hr class="border-white mb-4">

    <!-- Tombol Tambah -->
    <button data-modal-target="tambahModal" data-modal-toggle="tambahModal"
        class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-4 py-2 rounded mb-4">
        TAMBAH DATA MEJA
    </button>

    <!-- Modal -->
    <div id="tambahModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="bg-white rounded-lg shadow-lg w-full max-w-md p-6 text-gray-900">
            <div class="flex justify-between items-center mb-4">
                <h5 class="text-xl font-bold">Tambah Data Meja</h5>
                <button class="text-gray-400 hover:text-black" data-modal-hide="tambahModal">&times;</button>
            </div>
            <form>
                <input type="text" class="w-full border p-2 mb-2 rounded" placeholder="ID Meja">
                <input type="text" class="w-full border p-2 mb-2 rounded" placeholder="Tipe Meja">
                <input type="text" class="w-full border p-2 mb-2 rounded" placeholder="Nama Meja">
                <input type="text" class="w-full border p-2 mb-2 rounded" placeholder="Harga">
                <input type="text" class="w-full border p-2 mb-2 rounded" placeholder="Status">
                <input type="file" class="w-full p-2 mb-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
            </form>
        </div>
    </div>

    <!-- Tabel -->
    <table class="w-full text-sm text-left text-gray-900 bg-white rounded-lg shadow overflow-hidden">
        <thead class="bg-blue-300 text-black">
            <tr>
                <th class="px-4 py-2">NO</th>
                <th class="px-4 py-2">ID MEJA</th>
                <th class="px-4 py-2">TIPE MEJA</th>
                <th class="px-4 py-2">NOMOR MEJA</th>
                <th class="px-4 py-2">HARGA</th>
                <th class="px-4 py-2">STATUS</th>
                <th class="px-4 py-2">FOTO MEJA</th>
                <th class="px-4 py-2">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mejas as $index => $meja)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $meja->id_meja }}</td>
                    <td class="px-4 py-2">{{ $meja->tipe_meja }}</td>
                    <td class="px-4 py-2">{{ $meja->nama_meja }}</td>
                    <td class="px-4 py-2">{{ $meja->harga_perjam }}</td>
                    <td class="px-4 py-2">
                        {{ $meja->status_meja == 1 ? 'Tersedia' : 'Tidak Tersedia' }}
                    </td>
                    <td class="px-4 py-2">
                        <img src="{{ asset('images/' . $meja->foto_meja) }}" alt="Foto Meja" width="100">
                    </td>
                    <td class="px-4 py-2">
                        <button class="bg-green-500 text-white px-2 py-1 rounded">Edit</button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>
    <div><h1>Input Produk</h1></div>

    <form method="POST" action="{{ route('meja.simpan') }}" enctype="multipart/form-data">
        @csrf
            <table class="table">
                <tr>
                    <td>Nama Meja:</td>
                    <td colspan="3">
                        <input type="text" class="form-control" id="nama_meja" name="nama_meja" required>
                    </td>
                </tr>
                <tr>
                    <td>Tipe Meja:</td>
                    <td colspan="3">
                        <input type="text" class="form-control" id="tipe_meja" name="tipe_meja" required>
                    </td>
                </tr>
                <tr>
                    <td>Harga:</td>
                    <td colspan="3">
                        <input type="number" class="form-control" id="harga_perjam" name="harga_perjam" required>
                    </td>
                </tr>
                <tr>
                    <td>Foto:</td>
                    <td colspan="3">
                        <input type="file" class="form-control" id="foto_meja" name="foto_meja" accept="image/*" required>
                    </td>
                </tr>
                <tr>
                    <td>Status:</td>
                    <td colspan="3">
                        <select class="form-control" id="status_meja" name="status_meja">
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </td>
                </tr>
            </table>
            <button type="submit" class="text-white bg-gradient-to-r from-green-400 via-green-500 to-green-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 mt-4">
                Simpan
            </button>
        </form>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-2 rounded mt-4">
                {{ session('success') }}
             </div>
        @endif
        @endsection
