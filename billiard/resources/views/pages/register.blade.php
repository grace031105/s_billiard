@extends('layouts.register')

@section('title', 'Registrasi')

@section('content')
<!-- Success Popup -->
@if(session('success'))
  <div class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-800 px-6 py-4 rounded-lg shadow-lg z-50">
    <p>{{ session('success') }}</p>
    <button onclick="this.parentElement.style.display='none'" class="ml-4 text-sm text-green-700 hover:underline">Tutup</button>
  </div>
@endif

<!-- Error Popup -->
@if ($errors->any())
    <div class="bg-red-200 text-red-800 p-2 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>- {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Form Registrasi -->
<form action="{{ route('register') }}" method="POST" class="bg-white/90 p-8 rounded-2xl shadow-xl w-full max-w-md text-center backdrop-blur-sm">
  @csrf
  <h2 class="text-2xl font-bold text-gray-800 mb-6">Registrasi</h2>

  <!-- Nama Pengguna -->
  <div class="mb-4 relative">
    <input type="text" name="nama_pengguna" value="{{ old('nama_pengguna') }}" placeholder="Nama Pengguna"
      class="w-full px-5 py-3 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
    <i class="fa-solid fa-user-circle absolute right-4 top-1/2 transform -translate-y-1/2 text-white"></i>
  </div>

  <!-- Email -->
  <div class="mb-4 relative">
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email"
      class="w-full px-5 py-3 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
    <i class="fa-solid fa-envelope absolute right-4 top-1/2 transform -translate-y-1/2 text-white"></i>
  </div>

  <!-- Nomor Telepon -->
  <div class="mb-4 relative">
    <input type="text" name="nomor_hp" value="{{ old('nomor_hp') }}" placeholder="Nomor Hp"
      class="w-full px-5 py-3 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
    <i class="fa-solid fa-phone absolute right-4 top-1/2 transform -translate-y-1/2 text-white"></i>
  </div>

  <!-- Kata Sandi -->
  <div class="mb-6 relative">
    <input type="password" name="kata_sandi" placeholder="Kata Sandi"
      class="w-full px-5 py-3 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
    <i class="fa-solid fa-lock absolute right-4 top-1/2 transform -translate-y-1/2 text-white"></i>
  </div>

  <!-- Konfirmasi Kata Sandi -->
<div class="mb-6 relative">
  <input type="password" name="kata_sandi_confirmation" placeholder="Konfirmasi Kata Sandi"
    class="w-full px-5 py-3 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
  <i class="fa-solid fa-lock absolute right-4 top-1/2 transform -translate-y-1/2 text-white"></i>
</div>

  <!-- Tombol Registrasi -->
  <button type="submit"
    class="w-full bg-black hover:bg-gray-900 text-white font-semibold py-3 rounded-full transition">
    Registrasi
  </button>

  <!-- Link ke login -->
  <div class="mt-4 text-sm text-gray-700">
    Sudah punya akun? <a href="{{ route('login') }}" class="font-bold hover:underline">Klik Disini</a>
  </div>
</form>
@endsection
