@extends('layouts.app')

@section('title', 'Edit Profil')

@section('content')
<div class="min-h-screen bg-[#C6CED5] flex items-center justify-center px-4 py-8">
  <div class="w-full max-w-2xl space-y-6">
    <h2 class="text-2xl font-bold text-center text-[#1E293B]">Edit Profil</h2>

    <form action="{{ route('profil.update') }}" method="POST" class="space-y-6">
      @csrf

      <div class="space-y-4">
        <div>
          <label class="block text-[#1E293B] font-semibold mb-1">Nama Pengguna</label>
          <input type="text" name="nama_pengguna" value="{{ old('nama_pengguna', $user->nama_pengguna) }}"
            class="w-full bg-[#1D3C5C] text-white px-5 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="Masukkan Nama Pengguna Baru">
        </div>
        <div>
          <label class="block text-[#1E293B] font-semibold mb-1">Nomor Telepon</label>
          <input type="text" name="nomor_hp" value="{{ old('nomor_hp', $user->nomor_hp) }}"
            class="w-full bg-[#1D3C5C] text-white px-5 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="Masukkan Nomor Telepon Baru">
        </div>
        <div>
          <label class="block text-[#1E293B] font-semibold mb-1">Email</label>
          <input type="email" name="email" value="{{ old('email', $user->email) }}"
            class="w-full bg-[#1D3C5C] text-white px-5 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="Masukkan Email Baru">
        </div>
        <div>
          <label class="block text-[#1E293B] font-semibold mb-1">Kata Sandi</label>
          <input type="password" name="password"
            class="w-full bg-[#1D3C5C] text-white px-5 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-300"
            placeholder="Masukkan Kata Sandi Baru">
        </div>
      </div>
      <div class="mt-8 space-y-4">
        <button type="submit"
                class="w-full bg-[#1D3C5C] hover:bg-[#162c44] text-white py-3 rounded-md font-semibold shadow-md">
          Simpan Perubahan
        </button>
        <a href="{{ route('profil.show') }}"
           class="block w-full border border-[#1D3C5C] text-[#1D3C5C] text-center py-3 rounded-md font-semibold shadow-sm hover:bg-[#e5e7eb]">
          Batal
        </a>
      </div>
    </form>

  </div>
</div>
@endsection
