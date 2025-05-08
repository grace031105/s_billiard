@extends('layouts.meja')

@section('title', 'Kelola Meja')

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
                <th class="px-4 py-2">AKSI</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($mejas as $index => $meja)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $meja['id'] }}</td>
                    <td class="px-4 py-2">{{ $meja['tipe'] }}</td>
                    <td class="px-4 py-2">{{ $meja['nama'] }}</td>
                    <td class="px-4 py-2">{{ $meja['harga'] }}</td>
                    <td class="px-4 py-2">{{ $meja['status'] }}</td>
                    <td class="px-4 py-2">
                        <button class="bg-green-500 text-white px-2 py-1 rounded">Edit</button>
                        <button class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
