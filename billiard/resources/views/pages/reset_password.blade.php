<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Kata Sandi</title>
  <style>
    body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background: url('https://pearsoncues.com/media/wysiwyg/Whats_inside_a_pool_ball.jpg') no-repeat center center fixed;
  background-size: cover;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.form-box {
  background-color: rgba(220, 225, 230, 0.95); /* abu muda semi transparan */
  padding: 40px 30px;
  border-radius: 20px;
  width: 400px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.3);
  display: flex;
  flex-direction: column;
  justify-content: center;
}

.form-box h2 {
  text-align: center;
  margin-bottom: 25px;
  font-size: 24px;
  font-weight: bold;
  color: #000;
}

.form-box form {
  display: flex;
  flex-direction: column;
  gap: 16px;
}

.form-box input {
  width: 94%;
  padding: 12px;
  border: none;
  border-radius: 30px;
  background-color: #1E2738;
  color: white;
  font-size: 14px;
}

.form-box input::placeholder {
  color: white;
}

.btn-primary, .btn-secondary {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 30px;
  font-weight: bold;
  font-size: 16px;
  cursor: pointer;
}

.btn-primary {
  background-color: black;
  color: white;
}

.btn-secondary {
  background-color: black;
  color: white;
}

</style>
</head>
<body>
  <div class="container">
    <div class="form-box">
      <h2>Ubah Kata Sandi</h2>
      <form action="{{ route('password.reset') }}" method="POST">
  @csrf
  <input type="email" name="email" placeholder="Masukkan Email Anda" required />
  <input type="password" name="kata_sandi_baru" placeholder="Masukkan Kata Sandi Baru" required />
  <input type="password" name="konfirmasi_kata_sandi" placeholder="Konfirmasi Kata Sandi Baru" required />
  
  <button type="submit" class="btn-primary">Simpan Perubahan</button>
  <button type="button" class="btn-secondary" onclick="window.location.href='{{ route('login') }}'">Kembali</button>
</form>
    </div>
  </div>
</body>
</html>
