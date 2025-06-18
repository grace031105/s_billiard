<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
</head>
<body style="background-color: gray;">
    <h2>Apakah Anda yakin ingin logout?</h2>
    
    <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Ya, Logout</button>
</form>

    <a href="/beranda">Batal</a> <!-- Bisa diganti ke halaman lain -->
</body>
</html>
