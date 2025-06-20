@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-100 py-10 px-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Hasil Pencarian dari “{{ $keyword }}”</h1>

    @if ($hasil->isEmpty())
        <p class="text-gray-600">Tidak ada meja ditemukan.</p>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach ($hasil as $meja)
                <div class="bg-blue-900 text-white rounded-2xl overflow-hidden shadow-lg flex flex-col items-center p-4">
                    <img src="{{ asset('storage/foto_meja/' . $meja->foto_meja) }}" alt="{{ $meja->nama_meja }}" class="w-full h-40 object-cover rounded-xl mb-4">
                    
                    <h3 class="text-lg font-bold mb-1 text-center">{{ strtoupper($meja->nama_meja) }}</h3>
                    <p class="text-sm mb-4 text-center">{{ ucfirst($meja->tipe_meja) }}</p>

                    <button class="bg-white text-blue-900 font-semibold py-1 px-4 rounded-full">
                        Pilih Meja
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
