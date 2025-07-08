@extends('layouts.pelanggan')

@section('title', 'Data Pelanggan')
@section('sidebar')
@php
use App\Models\Reservasi;
$adaNotifBaru = Reservasi::where('status', 'menunggu_konfirmasi')
    ->where('is_seen', false)
    ->exists();
@endphp

<aside class="fixed top-0 left-0 w-64 h-screen bg-blue-900 text-white z-50">
    <div class="text-center py-6 border-b border-blue-600">
        <h2 class="text-2xl font-bold  tracking-wide">🎱 Billiard</h2>

    </div>
    <nav class="mt-4 px-4 space-y-2">
        <a href="{{ url('beranda') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-home mr-3"></i>
                <span>Beranda</span>
            </div>
        </a>
        <a href="{{ url('reservasi') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-calendar-alt mr-3"></i>
                <span>Data Reservasi</span>
                @if($adaNotifBaru)
                    <span class="absolute top-1.5 left-[200px] w-2.5 h-2.5 bg-red-500 rounded-full ring-2 ring-white "></span>
                    <span class="absolute top-1.5 left-[200px] w-2.5 h-2.5 bg-red-500 rounded-full ring-2 ring-white animate-ping"></span>
                @endif
            </div>
        </a>
        <a href="{{ url('kelola_meja') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-table mr-3"></i>
                <span>Kelola Meja</span>
            </div>
        </a>
        <a href="{{ route('kategori.index') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-table mr-3"></i>
                <span>Kelola Kategori</span>
            </div>
        </a>
        <a href="{{ url('pelanggan') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-users mr-3"></i>
                <span>Pelanggan</span>
            </div>
        </a>
    </nav>
    <div class="absolute bottom-0 w-full px-4 py-4 border-t border-blue-600">
        <form method="POST" action="{{ route('pemilik.logout') }}">
            @csrf
            <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
                <div class="relative flex items-center gap-3">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Keluar</span>
                </div>
            </a>
        </form>
    </div>
</aside>
@endsection

    @section('content')
    <h3 class="text-2xl font-bold mb-4 flex items-center"><i class="fas fa-users mr-2"></i>Data Pelanggan</h2>
    <hr class="border-white mb-4">

    <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left text-gray-700 bg-white rounded">
            <thead class="text-xs text-gray-700 uppercase bg-blue-200">
                <tr class="text-center">
                    <th class="py-3 px-6">No</th>
                    <th class="py-3 px-6">Nama Pengguna</th>
                    <th class="py-3 px-6">Email</th>
                    <th class="py-3 px-6">Nomor Hp</th>

                </tr>
            </thead>
            <tbody>
                 @foreach ($pelanggans as $index => $pelanggan)
                <tr class="border-b text-center">
                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                    <td class="px-4 py-2">{{ $pelanggan->nama_pengguna }}</td>
                    <td class="px-4 py-2">{{ $pelanggan->email }}</td>
                    <td class="px-4 py-2">{{ $pelanggan->nomor_hp }}</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
