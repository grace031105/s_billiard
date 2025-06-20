@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gray-300 flex items-center justify-center relative">

  <div class="w-full max-w-md bg-gray-300 px-6 py-10 pt-16">

    <!-- Judul -->
    <h1 class="text-center text-2xl font-bold text-blue-900 mb-8">Edit Profil</h1>

    <form action="{{ route('profil.update') }}" method="POST" class="space-y-6">
      @csrf

      <!-- Nama Pengguna -->
      <div>
        <label for="nama_pengguna" class="block mb-2 font-semibold text-gray-800">Nama Pengguna</label>
        <input type="text" id="nama_pengguna" name="nama_pengguna"
               value="{{ old('nama_pengguna', $user->nama_pengguna) }}"
               class="w-full px-5 py-3 bg-blue-900 text-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-700"
               required>
      </div>

      <!-- Nomor Telepon -->
      <div>
        <label for="no_telepon" class="block mb-2 font-semibold text-gray-800">Nomor Telepon</label>
        <input type="text" id="nomor_hp" name="nomor_hp"
               value="{{ old('nomor_hp', $user->nomor_hp) }}"
               placeholder="Masukkan Nomor Telepon Baru"
               class="w-full px-5 py-3 bg-blue-900 text-white placeholder-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-700"
               required>
      </div>

      <!-- Email -->
      <div>
        <label for="email" class="block mb-2 font-semibold text-gray-800">Email</label>
        <input type="email" id="email" name="email"
               value="{{ old('email', $user->email) }}"
               placeholder="Masukkan Email Baru"
               class="w-full px-5 py-3 bg-blue-900 text-white placeholder-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-700"
               required>
      </div>

      <!-- Kata Sandi Baru -->
      <div>
        <label for="kata_sandi_baru" class="block mb-2 font-semibold text-gray-800">Kata Sandi</label>
        <input type="password" id="kata_sandi_baru" name="kata_sandi_baru"
               placeholder="Masukkan Kata Sandi Baru"
               class="w-full px-5 py-3 bg-blue-900 text-white placeholder-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-700">
      </div>

      <!-- Tombol Simpan -->
      <div class="pt-2 space-y-4">
        <button type="submit"
                class="w-full bg-gray-900 text-white font-semibold py-3 rounded-md hover:bg-gray-800">
          Simpan Perubahan
        </button>

        <!-- Tombol Batal -->
        <a href="{{ route('profil.show') }}"
           class="w-full border border-gray-800 text-gray-800 text-center font-semibold py-3 rounded-md hover:bg-gray-200 block">
          Batal
        </a>
      </div>
    </form>

  </div>
</div>
@endsection
