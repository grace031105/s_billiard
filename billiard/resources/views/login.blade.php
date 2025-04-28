<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link href="https://tailwindcss-3.4.1.js" rel="stylesheet">

</head>
<body class="bg-cover bg-center" style="background-image: url('{{ asset('images/gambar1.jpg') }}');">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk | Billiard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
            background: url('FORCUE.png') no-repeat center center fixed;
            background-size: cover;
        }
        .card-login {
            background-color: rgba(209, 213, 219, 0.9);
            border-radius: 20px;
            padding: 30px;
            width: 100%;
            max-width: 400px;
        }
        label {
            margin-bottom: 5px;
            margin-left: 10px;
            font-weight: bold;
            color: black;
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
        .input-custom::placeholder {
            color: #9ca3af;
        }
        .position-icon {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            font-size: 22px;
            color: white;
            opacity: 0.7;
        }
        .btn-login {
            background-color: black;
            color: white;
            font-weight: bold;
            border-radius: 50px;
            height: 45px;
            border: none;
        }
        .btn-login:hover {
            background-color: #333;
        }
        .small-link a {
            color: black;
            font-weight: 500;
        }
        .small-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="card card-login shadow">
        <h2 class="text-center mb-4"><b>Masuk</b></h2>

        <?php if (isset($error)) : ?>
            <div class="alert alert-danger"><?= $error ?></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="nama_pengguna">Nama Pengguna</label>
                <div class="position-relative">
                    <input type="text" id="nama_pengguna" name="nama_pengguna" class="form-control input-custom" placeholder="Masukkan nama pengguna" required>
                    <i class='bx bxs-user position-icon'></i>
                </div>
            </div>

            <div class="mb-4">
                <label for="kata_sandi">Kata Sandi</label>
                <div class="position-relative">
                    <input type="password" id="kata_sandi" name="kata_sandi" class="form-control input-custom" placeholder="Masukkan kata sandi" required>
                    <i class='bx bxs-lock position-icon'></i>
                </div>
            </div>

            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-login">Masuk</button>
            </div>

            <div class="text-center small-link mb-2">
                <a href="#">Lupa Kata Sandi?</a>
            </div>
            <div class="text-center small-link">
                Belum punya akun? <a href="register.php">Klik di sini</a>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>