@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-300 relative flex items-center justify-center">

  <!-- Tombol Kembali -->
  <a href="{{ route('dash') }}" 
     class="absolute top-4 left-4 bg-blue-900 text-white w-11 h-11 rounded-full flex items-center justify-center shadow-lg hover:bg-blue-800 z-50">
    <i class="fas fa-arrow-left text-lg"></i>
  </a>

  <div class="w-full max-w-md bg-gray-300 px-6 py-10 pt-16">

    <!-- Judul -->
    <h1 class="text-center text-3xl font-bold text-blue-900 mb-8">Profil</h1>

    <!-- Avatar -->
    <div class="flex justify-center mb-6">
      <div class="w-32 h-32 bg-white border-4 border-black rounded-full flex items-center justify-center">
        <i class="fas fa-user text-black text-5xl"></i>
      </div>
    </div>

    <!-- Informasi Pengguna -->
    <div class="space-y-4 text-gray-800 font-semibold px-2">
      @php
        $info = [
          'Nama Pengguna' => $user->nama_pengguna,
          'Email' => $user->email,
          'No Telepon' => $user->nomor_hp,
        ];
      @endphp

      @foreach ($info as $label => $value)
      <div class="grid grid-cols-[130px_10px_1fr]">
        <span class="text-left">{{ $label }}</span>
        <span class="text-left">:</span>
        <span class="text-left">{{ $value }}</span>
      </div>
      @endforeach
    </div>

    <!-- Tombol Edit -->
    <div class="mt-10">
      <a href="{{ route('profil.edit') }}" 
         class="w-full bg-blue-900 hover:bg-blue-800 text-white py-3 rounded-md text-center font-semibold flex items-center justify-center gap-2 shadow-md">
        <i class="fas fa-pen-to-square"></i> Edit
      </a>
    </div>

  </div>
</div>
@endsection
