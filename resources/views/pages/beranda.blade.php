@extends('layouts.beranda')

@section('title', 'Beranda')

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
<h2 class="text-2xl font-semibold mb-6">BERANDA</h2>
<hr class="border-white mb-4">
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
    <a href="#" class="bg-slate-800 p-6 rounded-lg shadow hover:bg-slate-700">
        <h3 class="text-lg font-bold flex items-center">
            <i class="fas fa-table mr-3"></i> Meja VIP
        </h3>
        <p class="text-3xl font-semibold">{{ $totalVIP }}</p>
    </a>
    <a href="#" class="bg-yellow-400 text-black p-6 rounded-lg shadow hover:bg-yellow-300">
        <h3 class="text-lg font-bold flex items-center">
            <i class="fas fa-circle mr-3"></i> Meja Reguler
        </h3>
        <p class="text-3xl font-semibold">{{ $totalReguler }}</p>
    </a>
    <a href="#" class="bg-slate-800 p-6 rounded-lg shadow hover:bg-slate-700">
        <h3 class="text-lg font-bold flex items-center">
            <i class="fas fa-crown mr-3"></i> Meja Platinum
        </h3>
        <p class="text-3xl font-semibold">{{ $totalPlatinum }}</p>
    </a>
</div>
@endsection
