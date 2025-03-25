<!-- 
//nama file     : bioskop.blade.php
//deskripsi     : file ini untuk menampilkan halaman utama pengguna
//dibuat oleh   : Zahrah Nazihah Ginting (3312401077)
-->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TICS ID</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
          <a class="nav-link" href="#nowShowing">NOW SHOWING</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#comingSoon">COMING SOON</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Genre
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('search', ['query' => 'Action']) }}">Action</a></li>
            <li><a class="dropdown-item" href="{{ route('search', ['query' => 'Adventure']) }}">Adventure</a></li>
            <li><a class="dropdown-item" href="{{ route('search', ['query' => 'Sci-fi']) }}">Sci-fi</a></li>
            <li><a class="dropdown-item" href="{{ route('search', ['query' => 'Horror']) }}">Horror</a></li>
            <li><a class="dropdown-item" href="{{ route('search', ['query' => 'Drama']) }}">Drama</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <form class="d-flex" action="{{ route('search') }}" method="GET">
            <input class="form-control me-2" type="search" name="query" placeholder="Search Movies" aria-label="Search" style="border-radius: 20px;">
            <button class="btn btn-outline-light" type="submit" style="border-radius: 50px;"><i class='bx bx-search-alt-2'></i></button>
          </form>
        </li>
      </ul>
      <ul class="navbar-nav ms-3">
        @auth
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
        @else
          <li class="nav-item">
            <a class="btn btn-outline-light" href="{{ route('login') }}">Login</a>
          </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>

<!-- Carousel -->
<div class="col-md-12 p-0">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($carousel_images as $index => $image)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    <img src="{{ asset('uploads/' . $image['image_name']) }}" class="d-block w-100 img-fluid" alt="Carousel Image" style="height: 400px; width: 1200px;">
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
    </div>
</div>

<!-- Now Showing Section -->
<h4 class="text-center fw-bold my-4" id="nowShowing">Now Showing</h4>
<div id="nowShowingCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($now_showing->chunk(5) as $chunk)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="d-flex justify-content-center flex-wrap">
                    @foreach($chunk as $movie)
                        <div class="m-2" style="width: 220px;">
                            <div class="card">
                                <img src="{{ asset('uploads/' . $movie->poster) }}" class="card-img-top img-fluid" alt="{{ $movie->judul }}" />
                                <div class="card-body bg-light">
                                    <h5 class="card-title">{{ $movie->judul }}</h5>
                                    <p class="card-text">{{ $movie->genre }}</p>
                                    <a href="{{ route('pilih', ['id' => $movie->id, 'poster' => $movie->poster, 'judul' => $movie->judul]) }}" class="btn btn-warning">Book Now</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    @if($now_showing->count() > 5)
        <button class="carousel-control-prev" type="button" data-bs-target="#nowShowingCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#nowShowingCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    @endif
</div>

<!-- Coming Soon Section -->
<h4 class="text-center fw-bold my-4" id="comingSoon">Coming Soon</h4>
<div id="comingSoonCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($coming_soon->chunk(5) as $chunk)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <div class="d-flex justify-content-center flex-wrap">
                    @foreach($chunk as $movie)
                        <div class="m-2" style="width: 220px;">
                            <div class="card">
                                <img src="{{ asset('uploads/' . $movie->poster) }}" class="card-img-top img-fluid" alt="{{ $movie->judul }}" />
                                <div class="card-body bg-light">
                                    <h5 class="card-title">{{ $movie->judul }}</h5>
                                    <p class="card-text">{{ $movie->genre }}</p>
                                    <a href="#" class="btn btn-warning trailer-btn" data-bs-toggle="modal" data-bs-target="#trailerModal" data-video="{{ $movie->trailer }}">Trailer</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    @if($coming_soon->count() > 5)
        <button class="carousel-control-prev" type="button" data-bs-target="#comingSoonCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#comingSoonCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    @endif
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

<!-- Footer -->
<footer class="bg-dark text-white mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h4></h4>
                <br>
                <p class="justify-content-center">2024 All Rights Reserved.</p>
            </div>
            <div class="col-md-6">
                <br>
                <i class="bx bxl-instagram-alt" style="font-size: 26px;"><a href="" style="text-decoration: none; color: white; font-family: Poppins, sans-serif; margin-left: 5px;">Instagram</a></i> 
                <i class='bx bxl-facebook' style="font-size: 26px; margin-left: 15px;"><a href="" style="text-decoration: none; color: white; font-family: Poppins, sans-serif; margin-left: 2px;">Facebook</a></i>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Trailer Button Click Event
        const trailerButtons = document.querySelectorAll('.trailer-btn');
        const trailerVideo = document.getElementById('trailerVideo');
        const trailerModal = document.getElementById('trailerModal');

        if (trailerButtons.length > 0 && trailerVideo && trailerModal) {
            trailerButtons.forEach(button => {
                button.addEventListener('click', function() {
                    let videoUrl = this.getAttribute('data-video');
                    // Convert to embed URL if needed
                    if (videoUrl.includes('youtube.com/watch?v=')) {
                        const videoID = videoUrl.split('v=')[1];
                        videoUrl = `https://www.youtube.com/embed/${videoID}`;
                    }
                    trailerVideo.src = videoUrl;
                });
            });

            // Clear video URL when modal closes
            trailerModal.addEventListener('hidden.bs.modal', function() {
                trailerVideo.src = '';
            });
        }
    });
</script>
</body>
</html>