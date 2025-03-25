<!-- 
//nama file    : invoice.blade.php
//deskripsi    : file ii untuk menampilkan detail booking
//dibuat oleh  : Grace Anastasya Simanungkalit - NIM : 3312401073
-->


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tics ID - Booking Invoice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        .booking-history {
            text-align: center;
            margin-top: 30px;
        }
        .booking-history h2 {
            font-weight: bold;
        }
        .booking-details {
            background-color: #888;
            color: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            text-align: left;
            width: 100%;
            max-width: 600px;
        }
        .booking-details div {
            padding: 10px 0;
            border-bottom: 1px solid white;
        }
        .booking-details div:last-child {
            border-bottom: none;
        }
        .btn-secondary {
            width: 100%;
        }
        .back-btn {
            background-color: rgba(255, 255, 255, 0.2);
            padding: 10px 10px 0;
            margin: 5px;
            border-radius: 60px;
        }
        .back-btn i {
            font-size: 28px;
            color: white;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="{{ route('home') }}">TICS ID</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('home') }}">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}#nowShowing">NOW SHOWING</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('home') }}#comingSoon">COMING SOON</a>
        </li>
        <li class="nav-item">
          <form class="d-flex" action="{{ route('search') }}" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Search Movies" aria-label="Search" style="border-radius: 20px;">
            <button class="btn btn-outline-light" type="submit" style="border-radius: 50px;"><i class='bx bx-search-alt-2'></i></button>
          </form>
        </li>
      </ul>
      <ul class="navbar-nav ms-3">
          <li class="nav-item dropdown">
            <a class="nav-link btn-outline-light" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
              <i class="fas fa-user-circle" style="font-size: 32px; color: white;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
              <li><h6 class="dropdown-header text-muted">{{ auth()->user()->name }}</h6></li>
              <li><a class="dropdown-item" href="{{ route('profile') }}"><i class="bx bxs-user-circle"></i> Profile</a></li>
              <li><a class="dropdown-item" href="{{ route('booking.history') }}"><i class="bx bx-history"></i> Booking History</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="{{ route('logout') }}"><i class="bx bx-log-out"></i> Logout</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="{{ route('login') }}">Login</a>
          </li>
      </ul>
    </div>
  </div>
</nav>

<!-- Booking Invoice -->
<div class="container booking-history">
    <br>
    <br>
    <h2>Booking Invoice</h2>
    <div class="booking-details col-md-6">
        <a href="{{ route('home') }}" class="back-btn"><i class='bx bx-arrow-back'></i></a>
        <div class="text-center"><h2>TICS ID</h2></div>
        <div><strong>Booking ID:</strong> {{ $booking->booking_id }}</div>
        <div><strong>Customer Name:</strong> {{ $booking->username }}</div>
        <div><strong>Movie Title:</strong> {{ $booking->judul }}</div>
        <div><strong>Time:</strong> {{ $booking->waktu }}</div>
        <div><strong>Date:</strong> {{ $booking->tanggal }}</div>
        <div><strong>Seats:</strong> {{ implode(", ", $seats) }}</div>
        <div><strong>Theater:</strong> {{ $booking->theater }}</div>
        <div><strong>Total Price:</strong> Rp {{ number_format($booking->total_price, 0, ',', '.') }}</div>
        <form action="{{ route('export.pdf') }}" method="POST">
            <input type="hidden" name="booking_id" value="{{ $booking->booking_id }}">
            <button type="submit" class="btn btn-secondary mt-4">Export to PDF</button>
        </form>
    </div>
</div>

<!-- JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>