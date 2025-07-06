@extends('layouts.beranda')

@section('title', 'Beranda')

@section('sidebar')
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
                <span class="absolute top-1.5 left-[200px] w-2.5 h-2.5 bg-red-500 rounded-full ring-2 ring-white "></span>
                <span class="absolute top-1.5 left-[200px] w-2.5 h-2.5 bg-red-500 rounded-full ring-2 ring-white animate-ping"></span>
            </div>
        </a>
        <a href="{{ url('kelola_meja') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
            <div class="relative flex items-center gap-3">
                <i class="fas fa-table mr-3"></i>
                <span>Kelola Meja</span>
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
<div class="text-white">
    <h1 class="text-3xl font-bold mb-4">BERANDA MEJA BILLIARD</h2>
    <hr class="border-white mb-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- VIP -->
        <div class="p-6 bg-slate-800 rounded-xl shadow-md hover:shadow-lg transition text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-sky-300 mb-1">Meja VIP</p>
                    <h3 class="text-3xl font-bold text-white">{{ $totalVIP }}</h3>
                </div>
                <i class="fas fa-gem text-4xl text-sky-400"></i>
            </div>
            <div class="h-1 bg-sky-500 mt-4 rounded-full w-4/5"></div>
        </div>

        <div class="p-6 bg-slate-800 rounded-xl shadow-md hover:shadow-lg transition text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-sky-300 mb-1">Meja Reguler</p>
                    <h3 class="text-3xl font-bold text-white">{{ $totalReguler }}</h3>
                </div>
                <i class="fas fa-circle text-4xl text-sky-400"></i>
            </div>
            <div class="h-1 bg-sky-500 mt-4 rounded-full w-4/5"></div>
        </div>

        <div class="p-6 bg-slate-800 rounded-xl shadow-md hover:shadow-lg transition text-white">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-sky-300 mb-1">Meja Platinum</p>
                    <h3 class="text-3xl font-bold text-white">{{ $totalPlatinum }}</h3>
                </div>
                <i class="fas fa-crown text-4xl text-sky-400"></i>
            </div>
            <div class="h-1 bg-sky-500 mt-4 rounded-full w-4/5"></div>
        </div>
    </div>
</div>
@endsection
