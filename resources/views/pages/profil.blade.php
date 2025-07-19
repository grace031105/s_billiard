@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-[#C6CED5] relative">

  <div class="relative py-6">
    <a href="{{ route('dash') }}" class="absolute left-4 top-6">
      <div class="bg-[#1D3C5C] text-white rounded-[10px] w-10 h-10 flex items-center justify-center shadow">
        <i class="fas fa-arrow-left text-lg"></i>
      </div>
    </a>

    <h2 class="text-2xl font-bold text-[#1E293B] text-center">Profil</h2>
  </div>

  <div class="flex flex-col items-center text-center px-4 space-y-6">

    <div class="w-40 h-40 rounded-full border-[6px] border-black flex items-end justify-center overflow-hidden">
      <i class="fas fa-user text-black text-[110px] translate-y-2"></i>
    </div>

    <div class="space-y-4 text-gray-800 font-semibold text-left">
      @php
        $info = [
          'Nama Pengguna' => $user->nama_pengguna,
          'Email' => $user->email,
          'No Telepon' => $user->nomor_hp,
        ];
      @endphp

      @foreach ($info as $label => $value)
        <div class="grid grid-cols-[140px_10px_1fr]">
          <span>{{ $label }}</span>
          <span>:</span>
          <span>{{ $value }}</span>
        </div>
      @endforeach

    </div>
<div class="w-full max-w-md">
  <a href="{{ route('profil.edit') }}" 
     class="block bg-[#1D3C5C] hover:bg-blue-900 text-white py-3 rounded-md text-center font-semibold flex items-center justify-center gap-2 shadow-md">
    <i class="fas fa-pen-to-square"></i> Edit
  </a>
</div>
</div>
  </div>
</div>
@endsection
