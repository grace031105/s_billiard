<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profil dan Edit Profil</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Flowbite -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-200 font-sans">

  <!-- Header -->
  <header class="bg-blue-900 text-white p-4">
    <nav class="container mx-auto flex justify-between items-center">
      <h1 class="text-xl font-bold">Aplikasi Profil</h1>
      <ul class="flex space-x-4">
        <li><a href="#" class="hover:underline">Home</a></li>
        <li><a href="#" class="hover:underline">Profil</a></li>
        <li><a href="#" class="hover:underline">Keluar</a></li>
      </ul>
    </nav>
  </header>

  <!-- Halaman Profil -->
  <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md mt-6" id="profil">
    <button class="absolute top-6 left-6 bg-blue-800 text-white p-2 rounded-full" onclick="goToDashboard()">
      <i class="fas fa-arrow-left"></i>
    </button>
    <h2 class="text-xl font-bold text-blue-900 text-center mb-4">Profil</h2>

    <div class="flex justify-center mb-4">
      <div class="w-28 h-28 border-2 border-black rounded-full flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#1f3554" viewBox="0 0 24 24" class="w-16 h-16">
          <circle cx="12" cy="8" r="4" />
          <path d="M12 14c-5 0-9 2.5-9 5v1h18v-1c0-2.5-4-5-9-5z" />
        </svg>
      </div>
    </div>

    <div class="space-y-2 text-left text-gray-800">
      <div><strong>Nama Lengkap:</strong> Grace Kristina Ufairah Ginting</div>
      <div><strong>Nama Pengguna:</strong> grace_kristina</div>
      <div><strong>Email:</strong> grace@example.com</div>
      <div><strong>No. Telepon:</strong> 081234567890</div>
    </div>

    <button onclick="goToEdit()" class="mt-4 w-full bg-blue-800 text-white py-2 rounded-md font-semibold hover:bg-blue-900">
      <i class="fa-solid fa-pen-to-square mr-2"></i>Edit
    </button>
  </div>

  <!-- Halaman Edit Profil -->
  <div class="max-w-md mx-auto p-6 bg-white rounded-lg shadow-md mt-6 hidden" id="editProfil">
    <h2 class="text-xl font-bold text-blue-900 text-center mb-4">Edit Profil</h2>

    <label class="block text-gray-700 font-semibold mb-1">Nama Pengguna</label>
    <input type="text" class="w-full p-3 rounded-full bg-blue-900 text-white placeholder-gray-300 mb-3" value="Grace Kristina Ufairah Ginting" />

    <label class="block text-gray-700 font-semibold mb-1">Nomor Telepon</label>
    <input type="text" class="w-full p-3 rounded-full bg-blue-900 text-white placeholder-gray-300 mb-3" placeholder="Masukkan Nomor Telepon Baru" />

    <label class="block text-gray-700 font-semibold mb-1">Email</label>
    <input type="email" class="w-full p-3 rounded-full bg-blue-900 text-white placeholder-gray-300 mb-3" placeholder="Masukkan Email Baru" />

    <label class="block text-gray-700 font-semibold mb-1">Kata Sandi</label>
    <input type="password" class="w-full p-3 rounded-full bg-blue-900 text-white placeholder-gray-300 mb-3" placeholder="Masukkan Kata Sandi Baru" />

    <button onclick="goToProfile()" class="w-full bg-gray-800 text-white py-2 rounded-md font-semibold hover:bg-gray-900 mb-2">Simpan Perubahan</button>
    <button onclick="goToProfile()" class="w-full border-2 border-gray-800 text-gray-800 py-2 rounded-md font-semibold hover:bg-gray-100">Batal</button>
  </div>

  <!-- Footer -->
  <footer class="bg-blue-900 text-white text-center p-4 mt-10">
    <p>&copy; 2025 Aplikasi Profil - All rights reserved.</p>
    <div class="mt-2">
      <a href="#" class="hover:underline">Syarat & Ketentuan</a> |
      <a href="#" class="hover:underline">Kebijakan Privasi</a>
    </div>
  </footer>

  <!-- Script Navigasi -->
  <script>
    function goToEdit() {
      document.getElementById('profil').classList.add('hidden');
      document.getElementById('editProfil').classList.remove('hidden');
    }

    function goToProfile() {
      document.getElementById('profil').classList.remove('hidden');
      document.getElementById('editProfil').classList.add('hidden');
    }

    function goToDashboard() {
      window.location.href = 'dashboard.php';
    }
  </script>
</body>
</html>
