<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login | Billiard</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <!-- Boxicons (untuk ikon user dan lock) -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body class="bg-cover bg-center min-h-screen flex items-center justify-center" style="background-image: url('{{ asset('images/gambar1.jpg') }}');">
  <div class="bg-gray-300/90 p-8 rounded-2xl shadow-lg w-full max-w-md">
    <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Masuk</h2>

    <!-- Error message -->
    <?php if (isset($error)) : ?>
      <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <!-- Username -->
      <div class="mb-4">
        <label for="nama_pengguna" class="block font-semibold text-gray-700 mb-1 ml-2">Nama Pengguna</label>
        <div class="relative">
          <input type="text" id="nama_pengguna" name="nama_pengguna" placeholder="Masukkan nama pengguna"
            class="w-full py-3 pl-5 pr-12 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
          <i class='bx bxs-user absolute top-1/2 right-4 transform -translate-y-1/2 text-white text-xl'></i>
        </div>
      </div>

      <!-- Password -->
      <div class="mb-6">
        <label for="kata_sandi" class="block font-semibold text-gray-700 mb-1 ml-2">Kata Sandi</label>
        <div class="relative">
          <input type="password" id="kata_sandi" name="kata_sandi" placeholder="Masukkan kata sandi"
            class="w-full py-3 pl-5 pr-12 rounded-full bg-gray-800 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-600">
          <i class='bx bxs-lock absolute top-1/2 right-4 transform -translate-y-1/2 text-white text-xl'></i>
        </div>
      </div>

      <!-- Submit button -->
      <button type="submit"
        class="w-full bg-black text-white font-semibold py-3 rounded-full hover:bg-gray-900 transition">Masuk</button>

      <!-- Links -->
      <div class="text-center mt-4 text-sm text-gray-800">
        <a href="#" class="hover:underline font-medium">Lupa Kata Sandi?</a>
      </div>
      <div class="text-center text-sm text-gray-800 mt-2">
        Belum punya akun?
        <a href="register" class="font-medium hover:underline">Klik di sini</a>
      </div>
    </form>
  </div>
</body>
</html>
