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
<h3 class="text-2xl font-bold mb-2">Kelola Meja</h3>
<hr class="border-white mb-4">

<!-- Tombol untuk membuka modal -->
<button data-modal-target="tambahMejaModal" data-modal-toggle="tambahMejaModal" 
    class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow mb-4">
    Tambah Data Meja
</button>

<!-- Modal -->
<div id="tambahMejaModal" tabindex="-1" aria-hidden="true"
    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full mx-auto">
        <!-- Konten Modal -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Header -->
            <div
                class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600 bg-gray-100 dark:bg-gray-800">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Tambah Data Meja
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="tambahMejaModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
            </div>

            <!-- Form Input Meja -->
            <form method="POST" action="{{ route('meja.simpan') }}" enctype="multipart/form-data" class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4 text-gray-900 dark:text-white">
                @csrf
                <div>
                    <label for="nama_meja" class="block mb-1 font-medium">Nama Meja</label>
                    <input type="text" id="nama_meja" name="nama_meja" class="w-full rounded border border-gray-300 p-2"
                        required>
                </div>

                <div>
                    <label for="tipe_meja" class="block mb-1 font-medium">Tipe Meja</label>
                    <input type="text" id="tipe_meja" name="tipe_meja" class="w-full rounded border border-gray-300 p-2"
                        required>
                </div>

                <div>
                    <label for="harga_per_jam" class="block mb-1 font-medium">Harga</label>
                    <input type="number" id="harga_per_jam" name="harga_per_jam"
                        class="w-full rounded border border-gray-300 p-2" required>
                </div>

                <div>
                    <label for="status_meja" class="block mb-1 font-medium">Status</label>
                    <select id="status_meja" name="status_meja" class="w-full rounded border border-gray-300 p-2">
                        <option value="1">Tersedia</option>
                        <option value="0">Disewakan</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="foto_meja" class="block mb-1 font-medium">Foto Meja</label>
                    <input type="file" id="foto_meja" name="foto_meja" accept="image/*"
                        class="w-full rounded border border-gray-300 p-2" required>
                </div>

                <!-- Tombol Simpan dan Batal -->
                <div class="md:col-span-2 flex justify-end space-x-3 mt-4">
                    <button type="submit"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-5 rounded-lg shadow">
                        Simpan
                    </button>
                    <button type="button" data-modal-hide="tambahMejaModal"
                        class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-5 rounded-lg shadow">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Tabel Data Meja -->
<table
    class="w-full text-sm text-left text-gray-900 bg-white rounded-lg shadow overflow-hidden dark:bg-gray-800 dark:text-white">
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
            <td class="px-4 py-2">{{ $meja->harga_per_jam }}</td>
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

@if(session('success'))
<div class="bg-green-100 text-green-700 p-2 rounded mt-4">
    {{ session('success') }}
</div>
@endif

@endsection
