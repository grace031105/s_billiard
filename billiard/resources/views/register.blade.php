<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Registrasi - Forcue</title>

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
</head>

<body class="min-h-screen bg-cover bg-center flex items-center justify-center" style="background-image: url('https://pearsoncues.com/media/wysiwyg/Whats_inside_a_pool_ball.jpg');">

  <!-- Success Popup -->
  @if(session('success'))
    <div class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-green-100 text-green-800 px-6 py-4 rounded-lg shadow-lg z-50">
      <p>{{ session('success') }}</p>
      <button onclick="this.parentElement.style.display='none'" class="ml-4 text-sm text-green-700 hover:underline">Tutup</button>
    </div>
  @endif

  <!-- Error Popup -->
  @if($errors->any())
    <div class="fixed top-10 left-1/2 transform -translate-x-1/2 bg-red-100 text-red-800 px-6 py-4 rounded-lg shadow-lg z-50">
      <ul class="list-disc pl-5">
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
      <button onclick="this.parentElement.style.display='none'" class="ml-4 text-sm text-red-700 hover:underline">Tutup</button>
    </div>
  @endif

  <!-- Form Registrasi -->
  <form method="POST" action="{{ route('register') }}" class="bg-white/90 p-8 rounded-2xl shadow-xl w-full max-w-md text-center backdrop-blur-sm">
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
      <input type="text" name="nomor_telepon" value="{{ old('nomor_telepon') }}" placeholder="Nomor Telepon"
        class="w-full px-5 py-3 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
      <i class="fa-solid fa-phone absolute right-4 top-1/2 transform -translate-y-1/2 text-white"></i>
    </div>

    <!-- Kata Sandi -->
    <div class="mb-6 relative">
      <input type="password" name="kata_sandi" placeholder="Kata Sandi"
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
</body>
</html>
