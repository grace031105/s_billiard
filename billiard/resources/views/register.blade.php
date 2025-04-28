<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar | Billiard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://tailwindcss-3.4.1.js" rel="stylesheet">
    <style>
        body {
            background: url('gambar1.png') no-repeat center center fixed;
            background-size: cover;
        }
        .card-custom {
            background-color: #d1d5db;
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }
        .input-group-text-custom {
            background: transparent;
            border: none;
            color: white;
            opacity: 0.7;
        }
        .input-custom {
            background-color: #1f2937;
            color: white;
            border: none;
            border-radius: 50px;
            padding-left: 20px;
            padding-right: 50px;
            height: 45px;
        }
        .btn-custom {
            border-radius: 50px;
            background-color: black;
            color: white;
            font-weight: bold;
            height: 45px;
            border: none;
        }
        .small-link a {
            color: black;
            text-decoration: underline;
        }
        label {
            margin-bottom: 5px;
            margin-left: 10px;
            font-weight: bold;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card card-custom shadow">
        <h2 class="text-center mb-4"><b>Registrasi</b></h2>

        <?php
        if (isset($_SESSION['error'])) {
            echo "<div class='alert alert-danger'>" . $_SESSION['error'] . "</div>";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "<div class='alert alert-success'>" . $_SESSION['success'] . "</div>";
            unset($_SESSION['success']);
        }
        ?>

        <form method="POST" action="tambah_user.php">
            <div class="mb-3">
                <label class="text-dark">Nama Pengguna</label>
                <div class="position-relative">
                    <input type="text" name="nama_pengguna" class="form-control input-custom" placeholder="Masukkan nama pengguna" required>
                    <i class='bx bxs-user position-absolute' style="top: 50%; right: 20px; transform: translateY(-50%); font-size: 22px; color: white; opacity: 0.7;"></i>
                </div>
            </div>
            <div class="mb-3">
                <label class="text-dark">Email</label>
                <div class="position-relative">
                    <input type="email" name="email" class="form-control input-custom" placeholder="Masukkan email" required>
                    <i class='bx bxl-gmail position-absolute' style="top: 50%; right: 20px; transform: translateY(-50%); font-size: 22px; color: white; opacity: 0.7;"></i>
                </div>
            </div>
            <div class="mb-3">
                <label class="text-dark">Nomor Telepon</label>
                <div class="position-relative">
                    <input type="number" name="nomor_telepon" class="form-control input-custom" placeholder="Masukkan nomor telepon" required>
                    <i class='bx bxs-phone position-absolute' style="top: 50%; right: 20px; transform: translateY(-50%); font-size: 22px; color: white; opacity: 0.7;"></i>
                </div>
            </div>
            <div class="mb-4">
                <label class="text-dark">Kata Sandi</label>
                <div class="position-relative">
                    <input type="password" name="kata_sandi" class="form-control input-custom" placeholder="Masukkan kata sandi" required>
                    <i class='bx bxs-lock position-absolute' style="top: 50%; right: 20px; transform: translateY(-50%); font-size: 22px; color: white; opacity: 0.7;"></i>
                </div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-custom">Registrasi</button>
            </div>
        </form>

        <div class="text-center small-link mt-2">
            <p>Sudah punya akun? <a href="login.blade.php">Klik di sini</a></p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>