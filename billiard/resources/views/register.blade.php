<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Forcue</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
      margin: 0;
      padding: 0;
      background: url('https://pearsoncues.com/media/wysiwyg/Whats_inside_a_pool_ball.jpg') no-repeat center center/cover;
      height: 100vh;
      font-family: 'Poppins', sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: rgba(220, 230, 240, 0.95);
      padding: 40px 30px;
      border-radius: 20px;
      width: 350px;
      text-align: center;
      box-shadow: 0px 8px 20px rgba(0,0,0,0.2);
    }

    .form-container h2 {
      margin-bottom: 25px;
      font-size: 28px;
      color: #111;
    }

    .input-group {
      background: #1f2937;
      border-radius: 30px;
      padding: 12px 20px;
      margin-bottom: 15px;
      display: flex;
      align-items: center;
    }

    .input-group i {
      color: #fff;
    }

    .input-group input {
      background: none;
      border: none;
      outline: none;
      color: #fff;
      margin-left: 10px;
      flex: 1;
      font-size: 15px;
    }

    button {
      width: 100%;
      background: #000;
      color: #fff;
      padding: 12px;
      border: none;
      border-radius: 30px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      margin-top: 10px;
      transition: 0.3s;
    }

    button:hover {
      background: #333;
    }

    .bottom-text {
      margin-top: 20px;
      font-size: 14px;
    }

    .bottom-text a {
      color: #000;
      text-decoration: underline;
      font-weight: bold;
    }

    /* Style untuk pop-up */
    .popup {
      display: none;
      position: fixed;
      top: 10%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: rgba(255, 255, 255, 0.7);
      color: black;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 8px 15px rgba(0,0,0,0.5);
      z-index: 1000;
    }

    .popup button {
      background:rgb(73, 85, 151);
      border: none;
      padding: 10px;
      color: black;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
    }

    .popup button:hover {
      background:rgb(253, 247, 247);
    }
    </style>
</head>
<body>

    @if(session('success'))
        <div class="popup" id="successPopup">
            <p>{{ session('success') }}</p>
            <button onclick="document.getElementById('successPopup').style.display='none'">Tutup</button>
        </div>
    @endif

    @if($errors->any())
        <div class="popup" id="errorPopup">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button onclick="document.getElementById('errorPopup').style.display='none'">Tutup</button>
        </div>
    @endif

    <form class="form-container" method="POST" action="{{ route('register') }}">
        @csrf

        <h2>Registrasi</h2>

        <div class="input-group">
            <input type="text" name="nama_pengguna" placeholder="Nama Pengguna" value="{{ old('nama_pengguna') }}" required>
            <i class="fa-solid fa-user-circle"></i>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <i class="fa-solid fa-envelope"></i>
        </div>

        <div class="input-group">
            <input type="text" name="nomor_telepon" placeholder="Nomor Telepon" value="{{ old('nomor_telepon') }}" required>
            <i class="fa-solid fa-phone"></i>
        </div>

        <div class="input-group">
            <input type="password" name="kata_sandi" placeholder="Kata Sandi" required>
            <i class="fa-solid fa-lock"></i>
        </div>

        <button type="submit">Registrasi</button>

        <div class="bottom-text">
            Sudah punya akun? <a href="{{ route('login') }}">Klik Disini</a>
        </div>
    </form>

    <script>
        // Otomatis tampilkan popup
        if (document.getElementById('errorPopup')) {
            document.getElementById('errorPopup').style.display = 'block';
        }
        if (document.getElementById('successPopup')) {
            document.getElementById('successPopup').style.display = 'block';
        }
    </script>

</body>
</html>
