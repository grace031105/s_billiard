@extends('layouts.riwayat')

@section('title', 'Riwayat Penyewaan')

@section('content')

  <button onclick="history.back()" class="bg-[#1B3554] text-white px-4 py-2 rounded-md flex items-center space-x-2 mb-6">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
    </svg>
    <span>Kembali</span>
  </button>

  <h1 class="text-2xl font-bold text-center text-[#1B3554] mb-6">Riwayat Penyewaan</h1>

  <div class="overflow-x-auto">
    <table class="w-full text-sm text-left text-white">
      <thead class="bg-[#1B3554] text-center">
        <tr>
          <th class="px-6 py-3">Kode Resi</th>
          <th class="px-6 py-3">Tipe Meja</th>
          <th class="px-6 py-3">Tanggal Penyewaan</th>
          <th class="px-6 py-3">Aksi</th>
        </tr>
      </thead>
      <tbody class="text-center bg-[#26476a]">
        @foreach ($riwayat as $row)
        <tr class="border-b border-[#1B3554]">
          <td class="px-6 py-4">{{ $row['resi'] }}</td>
          <td class="px-6 py-4">{{ $row['tipe'] }}</td>
          <td class="px-6 py-4">{{ $row['tanggal'] }}</td>
          <td class="px-6 py-4">
            <a href="#" class="bg-white text-[#1B3554] font-semibold px-4 py-1 rounded-md">Detail</a>
          </td>
        </tr>
        @endforeach
        @if(count($riwayat) === 0)
        <tr>
          <td colspan="4" class="px-6 py-4 text-white">Tidak ada data penyewaan.</td>
        </tr>
        @endif
      </tbody>
    </table>
  </div>

@endsection
