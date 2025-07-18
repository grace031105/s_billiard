@extends('layouts.riwayat')

@section('title', 'Riwayat Penyewaan')

@section('content')
  <!-- Tombol Kembali -->
  <button onclick="history.back()" class="bg-[#1B3554] text-white px-4 py-2 rounded-md flex items-center space-x-2 mb-6">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    <span></span>
  </button>

  <!-- Judul Halaman -->
  <h1 class="text-2xl font-bold text-center text-[#1B3554] mb-6">Riwayat Penyewaan</h1>

  <!-- Tabel Riwayat -->
  <div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-white">
      <thead class="bg-[#1B3554] text-center">
        <tr>
          <th class="px-6 py-3">Kode Resi</th>
          <th class="px-6 py-3">Tanggal Cetak</th>
          <th class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center bg-[#26476a]">
        @forelse ($riwayat as $row)
          <tr class="border-b border-[#1B3554]">
            <td class="px-6 py-4">{{ $row['kode_resi'] }}</td>
            <td class="px-6 py-4">{{ $row['tanggal_cetak'] }}</td>
            <td>
              @php
                $reservasi = $row->transaksi->reservasi->first();
              @endphp

              @if ($row->id_transaksi)
                <a href="{{ route('resi.dari_transaksi', ['id_transaksi' => $row->id_transaksi])  }}"
                  class="bg-green-600 text-white px-6 py-3 rounded-full font-semibold hover:bg-green-700">
                  Lihat Resi
                </a>
              @else
                <span class="text-red-400">Reservasi tidak ditemukan</span>
              @endif
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="px-6 py-4 text-white">Tidak ada data penyewaan.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  @include('components.schedule_popup')
@endsection
