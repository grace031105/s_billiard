<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profil dan Edit Profil</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      font-family: sans-serif;
      background-color: #c7ccd1;
      margin: 0;
      padding: 0;
    }
    .container, .profile {
      padding: 20px;
      max-width: 400px;
      margin: auto;
      text-align: center;
    }
    h2 {
      font-weight: bold;
      color: #1f3554;
    }
    label {
      display: block;
      text-align: left;
      margin: 15px 0 5px;
      font-weight: 600;
      color: #3a3a3a;
    }
    input[type="text"], input[type="email"], input[type="password"] {
      width: 100%;
      padding: 15px;
      border: none;
      border-radius: 30px;
      background-color: #1f3554;
      color: white;
      font-size: 16px;
    }
    input::placeholder {
      color: #ccc;
    }
    .btn-primary, .btn-secondary, .edit-btn, .back-button {
      margin-top: 20px;
      padding: 15px;
      width: 100%;
      border-radius: 10px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }
    .btn-primary {
      background-color: #1f2633;
      color: white;
      border: none;
    }
    .btn-secondary {
      background-color: transparent;
      color: #1f2633;
      border: 3px solid #1f2633;
    }
    .edit-btn {
      background-color: #1f3554;
      color: white;
      border: none;
    }
    .back-button {
      position: absolute;
      top: 20px;
      left: 20px;
      background-color: #1f3554;
      color: white;
      border: none;
      border-radius: 30%;
      padding: 10px;
      width: 40px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 18px;
    }
    .profile-icon {
      margin-top: 20px;
    }
    .avatar-circle {
      width: 120px;
      height: 120px;
      background-color: transparant;
      border: 2px solid black;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: auto;
    }
    .avatar-circle svg {
      width: 70px;
      height: 70px;
    }
    .profile-info {
      text-align: left;
      margin: 20px 0;
    }
    .profile-info .info-row {
      display: flex;
      gap: 10px;
      margin: 10px 0;
    }
    .profile-info .label {
      width: 130px;
      font-weight: 600;
      color: #1f2633;
    }
    .profile-info .colon {
      width: 10px;
    }
    #editProfil {
      display: none;
    }
  </style>
</head>
<body>
  <!-- Halaman Profil -->
  <div class="profile" id="profil">
  <button class="back-button" onclick="goToDashboard()">
  <i class="fas fa-arrow-left"></i>
</button>
    <h2>Profil</h2>
    <div class="profile-icon">
      <div class="avatar-circle">
        <svg xmlns="http://www.w3.org/2000/svg" fill="#1f3554" viewBox="0 0 24 24">
          <circle cx="12" cy="8" r="4"/>
          <path d="M12 14c-5 0-9 2.5-9 5v1h18v-1c0-2.5-4-5-9-5z"/>
        </svg>
      </div>
    </div>
    <div class="profile-info">
      <div class="info-row"><span class="label">Nama Lengkap</span><span class="colon">:</span><span></span></div>
      <div class="info-row"><span class="label">Nama Pengguna</span><span class="colon">:</span><span></span></div>
      <div class="info-row"><span class="label">Email</span><span class="colon">:</span><span></span></div>
      <div class="info-row"><span class="label">No. Telepon</span><span class="colon">:</span><span></span></div>
    </div>
    <button class="edit-btn" onclick="goToEdit()">
    <i class="fa-solid fa-pen-to-square"></i>Edit</button>
  </div>

  <!-- Halaman Edit Profil -->
  <div class="container" id="editProfil">
    <h2>Edit Profil</h2>
    <label>Nama Pengguna</label>
    <input type="text" value="Grace Kristina Ufairah Ginting">

    <label>Nomor Telepon</label>
    <input type="text" placeholder="Masukkan Nomor Telepon Baru">

    <label>Email</label>
    <input type="email" placeholder="Masukkan Email Baru">

    <label>Kata Sandi</label>
    <input type="password" placeholder="Masukkan Kata Sandi Baru">

    <button class="btn-primary" onclick="goToProfile()">Simpan Perubahan</button>
    <button class="btn-secondary" onclick="goToProfile()">Batal</button>
  </div>

  <script>
    function goToEdit() {
      document.getElementById('profil').style.display = 'none';
      document.getElementById('editProfil').style.display = 'block';
    }

    function goToProfile() {
      document.getElementById('profil').style.display = 'block';
      document.getElementById('editProfil').style.display = 'none';
    }

    function goToDashboard() {
      window.location.href = 'dashboard.php'; // Ganti sesuai nama file dashboard kamu
    }
  </script>
</body>
</html>
