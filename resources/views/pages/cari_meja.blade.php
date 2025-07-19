
@extends('layouts.cari')

@section('content')
<div class="min-h-screen bg-[#C6CED5] py-10 px-6">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Hasil Pencarian dari “{{ $keyword }}”</h1>

    @if ($hasil->isEmpty())
        <p class="text-gray-600">Tidak ada meja ditemukan.</p>
    @else
        <div class="flex flex-wrap justify-start gap-6">
@foreach ($hasil as $meja)
                @php
                    $tipe = strtolower($meja->kategori->nama_kategori ?? '');
                    $routeName = match($tipe) {
                        'reguler' => 'meja_reguler.detail',
                        'vip' => 'meja_vip.detail',
                        'platinum' => 'meja_platinum.detail',
                        default => 'meja_reguler.detail',
                    };
                @endphp

                <div class="w-60 bg-[#0e2d4c] text-white rounded-2xl overflow-hidden shadow-lg flex flex-col items-center p-4">
    <img src="{{ asset('/images/' . $meja->foto_meja) }}" alt="{{ $meja->nama_meja }}" class="w-40 h-40 object-cover rounded-xl mb-4">

    <h3 class="text-lg font-bold mb-1 text-center">{{ strtoupper($meja->nama_meja) }}</h3>
    <p class="text-sm mb-4 text-center">{{ ucfirst($meja->kategori->nama_kategori ?? '-') }}</p>
@guest('pelanggan')
    <a href="{{ route('login') }}"
   class="bg-[#d9d9d9] text-[#1c2a41] font-bold py-2 px-6 rounded-full hover:bg-gray-300 transition">
   Pilih Meja
</a>  
@else
<a href="{{ route($routeName, ['id' => $meja->id_meja]) }}"
   class="bg-[#d9d9d9] text-[#1c2a41] font-bold py-2 px-6 rounded-full hover:bg-gray-300 transition">
   Pilih Meja
</a>

@endguest
</div>



@endforeach
@include('components.popup_form')
@include('components.schedule_popup')

@push('scripts')
@endpush
        </div>
    @endif
</div>
@endsection
