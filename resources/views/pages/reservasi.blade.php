@extends('layouts.reservasi')

@section('title', 'Data Reservasi')

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
        <a href="{{ route('pemilik.pelanggan') }}" class="flex items-center p-3 rounded-lg hover:bg-slate-700 transition">
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
<div class="flex items-center justify-between mb-2">
    <h1 class="text-2xl font-bold flex items-center">
        <i class="fas fa-chart-bar mr-3"></i>Data Reservasi Meja Billiard
    </h1>

    <div>
        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio" class="inline-flex items-center text-white bg-[#0D1322] border border-gray-600 hover:bg-gray-700 focus:ring-2 focus:ring-blue-600 font-medium rounded-lg text-sm px-3 py-1.5">
            <svg class="w-3 h-3 me-3" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm3.982 13.982a1 1 0 0 1-1.414 0l-3.274-3.274A1.012 1.012 0 0 1 9 10V6a1 1 0 0 1 2 0v3.586l2.982 2.982a1 1 0 0 1 0 1.414Z"/>
            </svg>
            Filter
            <svg class="w-2.5 h-2.5 ms-2.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </svg>
        </button>

        <div id="dropdownRadio" class="z-10 hidden w-48 mt-1 bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600">
            <form method="GET" action="{{ route('reservasi.index') }}" id="filterForm">
                <ul class="p-3 space-y-1 text-sm text-gray-700 dark:text-gray-200">
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-1" type="radio" name="filter" value="today"
                                class="w-4 h-4 text-blue-600"                                    onchange="document.getElementById('filterForm').submit();"
                                    {{ request('filter') == 'today' ? 'checked' : '' }} />
                                <label for="filter-radio-1" class="ml-2 text-sm font-medium">Hari ini</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-2" type="radio" name="filter" value="week"
                                class="w-4 h-4 text-blue-600"
                                onchange="document.getElementById('filterForm').submit();"                                    {{ request('filter') == 'week' ? 'checked' : '' }} />
                                <label for="filter-radio-2" class="ml-2 text-sm font-medium">7 hari terakhir</label>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center p-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                            <input id="filter-radio-3" type="radio" name="filter" value="month"
                                class="w-4 h-4 text-blue-600"
                                onchange="document.getElementById('filterForm').submit();"
                                {{ request('filter') == 'month' ? 'checked' : '' }} />
                            <label for="filter-radio-3" class="ml-2 text-sm font-medium">30 hari terakhir</label>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<hr class="border-white mb-4">
<table class="w-full text-sm text-left text-gray-900 bg-white rounded-lg shadow overflow-hidden">
    <thead class="bg-blue-300 text-black">
        <tr>
            <th class="px-4 py-2">KODE</th>
            <th class="px-4 py-2">PELANGGAN</th>
            <th class="px-4 py-2">MEJA</th>
            <th class="px-4 py-2">TIPE</th>
            <th class="px-4 py-2">MULAI</th>
            <th class="px-4 py-2">SELESAI</th>
            <th class="px-4 py-2">TOTAL</th>
            <th class="px-4 py-2">BUKTI BAYAR</th>
            <th class="px-4 py-2">STATUS</th>
            <th class="px-4 py-2">AKSI</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($reservasih as $index => $reservasi)
        <tr class="border-b" data-tanggal="{{ $reservasi->tanggal_reservasi }}">
            <!--<td class="px-4 py-2">{{ $index + 1 }}</td>-->
            <td class="px-4 py-2">{{ $reservasi->kode_reservasi }}</td>
            <td class="px-4 py-2">{{ $reservasi->pelanggan->nama_pengguna }}</td>
            <td class="px-4 py-2">{{ $reservasi->meja->nama_meja }}</td>
            <td class="px-4 py-2">{{ $reservasi->meja->kategori->nama_kategori ?? '-' }}</td>
            <td class="px-4 py-2">{{ optional($reservasi->waktu)->jam_mulai ?? '-' }}</td>
            <td class="px-4 py-2">{{ optional($reservasi->waktu)->jam_selesai ?? '-' }}</td>
            <td class="px-4 py-2">Rp {{ number_format($reservasi->total_harga, 0, ',', '.') }}</td>
            <td class="px-4 py-2">
                @if ($reservasi->transaksi && $reservasi->transaksi->bukti_pembayaran)
                    <img src="{{ asset('storage/' . $reservasi->transaksi->bukti_pembayaran) }}" alt="Bukti" class="w-24 h-auto rounded shadow">
                @else
                    <span class="italic text-gray-500">Belum Upload</span>
                @endif
            </td>
            <td class="px-4 py-2">
                @switch($reservasi->status)
                    @case('dikonfirmasi')
                        <span class="text-green-600 font-bold">Sudah dikonfirmasi</span>
                        @break
                    @case('menunggu_konfirmasi')
                        <span class="text-yellow-500 font-semibold">Menunggu Konfirmasi</span>
                        @break
                    @case('dibatalkan')
                        <span class="text-red-500 font-semibold">Dibatalkan</span>
                        @break
                    @default
                        <span class="text-gray-500">Menunggu konfirmasi</span>
                @endswitch
            </td>
            <td class="px-4 py-2">
                <div class="flex gap-2 items-center relative">
                <!-- Tombol Konfirmasi dengan Tooltip -->
                    <form action="{{ route('reservasi.konfirmasi', $reservasi->id_reservasi) }}" method="POST">
                         @csrf
                        <button type="submit" 
                                data-tooltip-target="tooltip-konfirmasi-{{ $reservasi->id_reservasi }}"
                                data-tooltip-placement="bottom"
                                class="bg-green-500 hover:bg-green-600 text-white px-2 py-1 rounded">
                            <i class="fas fa-check"></i>
                        </button>
                        <div id="tooltip-konfirmasi-{{ $reservasi->id_reservasi }}" role="tooltip"class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                            Konfirmasi Reservasi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </form>

                    <!-- Tombol Batal dengan Tooltip -->
                    <form action="{{ route('reservasi.batal', $reservasi->id_reservasi) }}" method="POST">
                        @csrf
                        <button type="submit" 
                                data-tooltip-target="tooltip-batal-{{ $reservasi->id_reservasi }}"
                                data-tooltip-placement="bottom"
                                class="bg-red-500 hover:bg-red-600 text-white px-2 py-1 rounded">
                            <i class="fas fa-times"></i>
                        </button>
                        <div id="tooltip-batal-{{ $reservasi->id_reservasi }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip">
                            Batalkan Reservasi
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="mt-4 pagination-info">
    {{ $reservasih->links('pagination::tailwind') }}
</div>
@push('styles')
<style>
    .pagination-info p {
        color: white !important;
    }
</style>
@endpush

@endsection
@push('scripts')
<script>
document.querySelectorAll('input[name="filter-radio"]').forEach(radio => {
    radio.addEventListener('change', function () {
        const selectedLabel = this.nextElementSibling.textContent.trim();
        const rows = document.querySelectorAll('tbody tr');
        const today = new Date();
        let days = 0;

        if (selectedLabel.includes('Last day')) days = 1;
        else if (selectedLabel.includes('7')) days = 7;
        else if (selectedLabel.includes('30')) days = 30;
        else if (selectedLabel.toLowerCase().includes('month')) days = 30;
        else if (selectedLabel.toLowerCase().includes('year')) days = 365;

        rows.forEach(row => {
            const tanggal = row.getAttribute('data-tanggal');
            if (!tanggal) {
                row.style.display = 'none';
                return;
            }

            const rowDate = new Date(tanggal);
            const diffTime = today - rowDate;
            const diffDays = diffTime / (1000 * 60 * 60 * 24);

            row.style.display = (diffDays <= days) ? '' : 'none';
        });
    });
});
</script>
@endpush
