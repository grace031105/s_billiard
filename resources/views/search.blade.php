<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search Results</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: #f8f9fa;
      padding-top: 60px;
    }
    .navbar {
      background-color: #343a40;
    }
    .card {
      transition: transform 0.3s;
    }
    .card:hover {
      transform: scale(1.05);
    }
    .card-img-top {
      height: 300px;
      object-fit: cover;
    }
  </style>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold" href="bioskop.html">TICS ID</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="bioskop.html">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bioskop.html#nowShowing">NOW SHOWING</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="bioskop.html#comingSoon">COMING SOON</a>
        </li>
        <li class="nav-item">
          <form class="d-flex" action="search.html" method="GET">
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
            <li><h6 class="dropdown-header text-muted">SampleUser</h6></li>
            <li><a class="dropdown-item" href="profile.html"><i class="bx bxs-user-circle"></i> Profile</a></li>
            <li><a class="dropdown-item" href="booking_history.html"><i class="bx bx-history"></i> Booking History</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item text-danger" href="logout.html"><i class="bx bx-log-out"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-5">
  <h3>Search Results for "Avengers"</h3>
  
  <!-- Section Sedang Tayang -->
  <h4 class="mt-5">Now Showing</h4>
  <div class="row">
    <div class="col-md-2">
      <div class="card mb-4">
        <img class="card-img-top" src="uploads/avengers.jpg" alt="Movie Poster">
        <div class="card-body">
          <h5 class="card-title">Avengers: Endgame</h5>
          <a href="pilih.html" class="btn btn-warning">Book Now</a>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card mb-4">
        <img class="card-img-top" src="uploads/avengers2.jpg" alt="Movie Poster">
        <div class="card-body">
          <h5 class="card-title">Avengers: Infinity War</h5>
          <a href="pilih.html" class="btn btn-warning">Book Now</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Section Coming Soon -->
  <h4 class="mt-5">Coming Soon</h4>
  <div class="row">
    <div class="col-md-2">
      <div class="card mb-4">
        <img class="card-img-top" src="uploads/avengers5.jpg" alt="Movie Poster">
        <div class="card-body">
          <h5 class="card-title">Avengers: Secret Wars</h5>
          <a href="#" class="btn btn-warning trailer-btn" data-bs-toggle="modal" data-bs-target="#trailerModal" data-video="https://www.youtube.com/watch?v=example1">Trailer</a>
        </div>
      </div>
    </div>
    <div class="col-md-2">
      <div class="card mb-4">
        <img class="card-img-top" src="uploads/avengers6.jpg" alt="Movie Poster">
        <div class="card-body">
          <h5 class="card-title">Avengers: Kang Dynasty</h5>
          <a href="#" class="btn btn-warning trailer-btn" data-bs-toggle="modal" data-bs-target="#trailerModal" data-video="https://www.youtube.com/watch?v=example2">Trailer</a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal untuk Trailer -->
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
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

  var trailerModal = document.getElementById('trailerModal');
  trailerModal.addEventListener('hidden.bs.modal', function() {
    var trailerVideo = document.getElementById('trailerVideo');
    trailerVideo.src = '';
  });
</script>

</body>
</html>