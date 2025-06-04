@extends('layouts.pelanggan')

@section('title', 'Data Pelanggan')
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
    <h2 class="text-2xl font-bold mb-4 flex items-center"><i class="fas fa-users mr-2"></i> Data Pelanggan</h2>
    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 bg-white rounded">
            <thead class="text-xs text-gray-700 uppercase bg-blue-200">
                <tr>
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">ID Pelanggan</th>
                    <th class="py-3 px-6">Nama Pengguna</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Nomor HP</th>
                    <th class="py-3 px-6">Kata Sandi</th>
                </tr>
            </thead>
            <tbody>
                 @foreach ($pelanggans as $index => $pelanggan)
                <tr class="border-b">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $pelanggan->id_pelanggan }}</td>
                    <td class="px-4 py-2">{{ $pelanggan->nama_pengguna }}</td>
                    <td class="px-4 py-2">{{ $pelanggan->email }}</td>
                    <td class="px-4 py-2">{{ $pelanggan->kata_sandi }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
