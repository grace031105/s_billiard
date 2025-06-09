@extends('layouts.login')

@section('title', 'Login')

@section('content')
<div class="bg-gray-300/90 p-8 rounded-2xl shadow-lg w-full max-w-md">
  <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Masuk</h2>

  @if(session('success'))
  <div class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-800 px-6 py-4 rounded-lg shadow-lg z-50">
    <p>{{ session('success') }}</p>
    <button onclick="this.parentElement.style.display='none'" class="ml-4 text-sm text-green-700 hover:underline">Tutup</button>
  </div>
@endif


  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-4">
      <label for="nama_pengguna" class="block font-semibold text-gray-700 mb-1 ml-2">Nama Pengguna</label>
      <div class="relative">
        <input type="text" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan nama pengguna"
          class="w-full py-3 pl-5 pr-12 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
        <i class='bx bxs-user absolute top-1/2 right-4 transform -translate-y-1/2 text-white text-xl'></i>
      </div>
    </div>

    <div class="mb-6">
      <label for="kata_sandi" class="block font-semibold text-gray-700 mb-1 ml-2">Kata Sandi</label>
      <div class="relative">
        <input type="password" id="kata_sandi" name="kata_sandi" placeholder="Masukkan kata sandi"
          class="w-full py-3 pl-5 pr-12 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
        <i class='bx bxs-lock absolute top-1/2 right-4 transform -translate-y-1/2 text-white text-xl'></i>
      </div>
    </div>

    <button type="submit"
      class="w-full bg-black text-white font-semibold py-3 rounded-full hover:bg-gray-900 transition">Masuk</button>

    <div class="text-center mt-4 text-sm text-gray-800">
      <a href="{{ route('password.reset.form') }}" class="hover:underline font-medium">Lupa Kata Sandi?</a>
    </div>
    <div class="text-center text-sm text-gray-800 mt-2">
      Belum punya akun?
      <a href="{{ route('register') }}" class="font-medium hover:underline">Klik di sini</a>
    </div>
  </form>
</div>
@endsection
