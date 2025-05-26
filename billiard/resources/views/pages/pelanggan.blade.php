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
                <!-- Dummy data -->
                <tr class="bg-white border-b hover:bg-gray-50">
                    <td class="py-4 px-6">1</td>
                    <td class="py-4 px-6">PL001</td>
                    <td class="py-4 px-6">zahra123</td>
                    <td class="py-4 px-6">zahra@example.com</td>
                    <td class="py-4 px-6">08123456789</td>
                    <td class="py-4 px-6">********</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
