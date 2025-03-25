<!-- 
//nama file    : pilih.blade.php
//deskripsi    : file ii untuk menampilkan tampilan pilih film
//dibuat oleh  : Grace Anastasya Simanungkalit - NIM : 3312401073
-->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tics ID - Movie Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .booking-container {
            background-color: #f8f9fa;
            padding: 2rem;
            border-radius: 10px;
            margin-top: 2rem;
        }
        .movie-poster {
            width: 100%;
            height: 460px;
            border-radius: 10px;
        }
        .booking-options {
            background-color: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .dropdown-select {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border-radius: 40px;
            border: 1px solid white;
            background-color: #333;
            color: white;
        }
        .price-display {
            background-color: #eee;
            padding: 1rem;
            border-radius: 5px;
            text-align: center;
            margin-bottom: 1rem;
        }
        .choose-seat-btn {
            width: 100%;
            padding: 1rem;
            background-color: orange;
            color: white;
            border: none;
            border-radius: 40px;
            font-size: 1.2rem;
        }
        .poster-container {
            position: relative;
            width: 100%;
            height: auto;
        }
        .trailer-btn {
            position: absolute;
            bottom: 0px;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            background-color: rgba(255, 255, 255, 0.8);
            color: black;
            width: 100%;
            border-radius: 0px;
        }
        .trailer-btn:hover {
            background-color: rgba(255, 255, 255, 0.9);
            color: black;
        }
    </style>
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="bioskop.php">TICS ID</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="bioskop.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bioskop.php#nowShowing">NOW SHOWING</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bioskop.php#comingSoon">COMING SOON</a>
        </li>
        <li class="nav-item">
          <form class="d-flex" action="search.php" method="GET">
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
              <li><h6 class="dropdown-header text-muted">{{ auth()->user()->username }}</h6></li>
              <li><a class="dropdown-item" href="profile.php"><i class="bx bxs-user-circle"></i> Profile</a></li>
              <li><a class="dropdown-item" href="booking_history.php"><i class="bx bx-history"></i> Booking History</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item text-danger" href="logout.php"><i class="bx bx-log-out"></i> Logout</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="login.php">Login</a>
          </li>
      </ul>
    </div>
  </div>
</nav>

<br><br>
<!-- Main Content -->
<div class="container booking-container">
    <div class="row">
        <!-- Movie Poster -->
        <div class="col-md-4">
            <div class="poster-container">
                <!-- Replace with dynamic data from your controller -->
                <img src="uploads/{{ $poster }}" class="movie-poster" alt="{{ $judul }}">
                <a href="#" class="btn trailer-btn" data-bs-toggle="modal" data-bs-target="#trailerModal" data-video="{{ $trailer }}">Trailer</a>
            </div>
        </div>

        <!-- Booking Options -->
        <div class="col-md-8">
            <div class="booking-options">
                <form action="choose_seat.php" method="POST">
                    <input type="hidden" name="id" value="{{ $filmId }}">

                    <div class="price-display">
                        <div class="row">
                            <div class="col">Theater</div>
                            <div class="col text-end" id="selected-theater">-</div>
                        </div>
                        <div class="row">
                            <div class="col">Date</div>
                            <div class="col text-end" id="selected-date">-</div>
                        </div>
                        <div class="row">
                            <div class="col">Time</div>
                            <div class="col text-end" id="selected-time">-</div>
                        </div>
                        <div class="row">
                            <div class="col">Price</div>
                            <div class="col text-end">Rp. {{ number_format($harga, 0, ',', '.') }}</div>
                        </div>
                    </div>

                    <!-- Dropdown Theater -->
                    <select class="dropdown-select" name="theater" id="theaterSelect" required>
                        <option value="">Choose Theater</option>
                            <option value="{{ $theater }}">{{ $theater }}</option>
                    </select>

                    <!-- Dropdown Date -->
                    <select class="dropdown-select" name="jadwal" id="jadwalSelect" required>
                        <option value="">Choose Date</option>
                            <option value="{{ $date }}">{{ $date }}</option>
                    </select>

                    <!-- Dropdown Time -->
                    <select class="dropdown-select" name="waktu" id="waktuSelect" required>
                        <option value="">Choose Time</option>
                            <option value="{{ $time }}">{{ $time }}</option>
                    </select>

                    <button type="submit" class="choose-seat-btn">Choose Seat</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Trailer Modal -->
<div class="modal fade" id="trailerModal" tabindex="-1" aria-labelledby="trailerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="trailerModalLabel">Trailer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="ratio ratio-16x9">
                    <iframe id="trailerVideo" src="" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JS dan Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Script untuk mengupdate iframe video di modal
    var trailerBtns = document.querySelectorAll('.trailer-btn');
    trailerBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            var videoSrc = this.getAttribute('data-video');
            if (videoSrc.includes('youtube.com/watch?v=')) {
                var videoID = videoSrc.split('v=')[1];
                videoSrc = 'https://www.youtube.com/embed/' + videoID;
            }
            var trailerVideo = document.getElementById('trailerVideo');
            trailerVideo.src = videoSrc;
        });
    });
</script>
<script>
    // Event listener untuk dropdown dan pembaruan tampilan
    document.getElementById('theaterSelect').addEventListener('change', function() {
        const selectedTheater = this.value;
        document.getElementById('selected-theater').textContent = selectedTheater ? selectedTheater : '-';
    });

    document.getElementById('jadwalSelect').addEventListener('change', function() {
        const selectedDate = this.value;
        document.getElementById('selected-date').textContent = selectedDate ? selectedDate : '-';
    });

    document.getElementById('waktuSelect').addEventListener('change', function() {
        const selectedTime = this.value;
        document.getElementById('selected-time').textContent = selectedTime ? selectedTime : '-';
    });
</script>
</body>
</html>