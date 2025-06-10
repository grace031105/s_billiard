@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded-xl shadow-md">
    <a href="{{ route('dashboard') }}" class="inline-block mb-4 text-blue-600 hover:underline">
        ← Kembali ke Dashboard
    </a>

    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Edit Profil</h2>

    @if (session('success'))
        <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('profil.update') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Nama Pengguna</label>
            <input type="text" value="{{ $user->nama_pengguna }}" class="w-full p-3 rounded bg-gray-100 text-gray-800" disabled>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Email</label>
            <input type="email" name="email" value="{{ old('email', $user->email) }}"
                   class="w-full p-3 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-1">Nomor Telepon</label>
            <input type="text" name="no_telepon" value="{{ old('no_telepon', $user->no_telepon) }}"
                   class="w-full p-3 border rounded focus:outline-none focus:ring focus:border-blue-300" required>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 font-medium mb-1">Kata Sandi Baru</label>
            <input type="password" name="kata_sandi_baru" placeholder="Kosongkan jika tidak ingin mengganti"
                   class="w-full p-3 border rounded focus:outline-none focus:ring focus:border-blue-300">
        </div>

        <button type="submit" class="w-full bg-blue-700 text-white py-3 rounded hover:bg-blue-800 transition">
            Simpan Perubahan
        </button>
    </form>
</div>
@endsection
