@extends('layouts.login')

@section('title', 'Login Pemilik')

@section('content')
<div class="bg-gray-300/90 p-8 rounded-2xl shadow-lg w-full max-w-md">
  <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">PEMILIK</h2>

  @if ($errors->any())
    <div class="text-red-600 mb-3 text-sm">
        {{ $errors->first() }}
    </div>
  @endif

  <form method="POST" action="{{ route('pemilik.login') }}">
    @csrf

    <div class="mb-4">
      <label class="block font-semibold text-gray-700 mb-1 ml-2">Email</label>
      <input type="email" name="email" placeholder="Masukkan email"
          class="w-full py-3 px-5 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
    </div>

    <div class="mb-6">
      <label class="block font-semibold text-gray-700 mb-1 ml-2">Kata Sandi</label>
      <input type="password" name="kata_sandi" placeholder="Masukkan kata sandi"
          class="w-full py-3 px-5 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600" required>
    </div>

    <button type="submit"
      class="w-full bg-black text-white font-semibold py-3 rounded-full hover:bg-gray-900 transition">Masuk</button>
  </form>
</div>
@endsection
