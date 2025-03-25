<!-- 
//nama file : chooseseat.blade.php
//deskripsi : file ini untuk fitur pemilihan kursi
//dibuat oleh : Zahrah Nazihah Ginting (3312401077)
-->


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Kursi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .seat-container {
            flex: 3;
            text-align: center;
            background-color:rgb(170, 170, 166);
            padding: 10px;
            border-radius: 20px;
            border: solid 2px white;
        }
        .seats {
            display: grid;
            grid-template-columns: repeat(10, 50px);
            gap: 10px;
            justify-content: center;
            margin-bottom: 30px;
        }
        .seat {
            width: 50px;
            height: 50px;
            background-color: #333;
            text-align: center;
            line-height: 50px;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
        }
        .seat.selected {
            background-color:rgb(57, 223, 79);
        }
        .seat.booked {
            background-color: red;
            cursor: not-allowed;
        }
        .booking-box {
            flex: 1;
            width: 250px;
            padding: 15px;
            background-color:rgb(170, 170, 166);
            border: 2px solid white;
            box-shadow: -2px 3px 10px -5px rgba(0, 0, 0, 0.75);
            -webkit-box-shadow: -2px 3px 10px -5px rgba(0, 0, 0, 0.75);
            -moz-box-shadow: -2px 3px 10px -5px rgba(0, 0, 0, 0.75);
            text-align: left;
            margin-left: 30px;
            border-radius: 20px;
            color: white;
        }
        .booking-box h1 {
            text-align: center;
            font-size: 28px;
            margin-bottom: 20px;
        }
        .book-btn {
            margin-top: 20px;
            padding: 12px;
            background: orange;
            color: white;
            border: 1px solid white;
            cursor: pointer;
            font-size: 16px;
            width: 30%;
            border-radius: 5px;
        }
        .booking-box p {
            margin: 10px 0;
            font-size: 14px;
        }
        .screen {
            background-color: #333;
            color: white;
            width: 80%;
            height: 20px;
            margin: 0 auto;
            border-radius: 8px;
            line-height: 20px;
            font-size: 18px;
            margin-bottom: 20px;
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
          <a class="nav-link" href="#nowShowing">NOW SHOWING</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#comingSoon">COMING SOON</a>
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
<br>
<br>
    <div class="container">
        <div class="seat-container">
            <div class="screen">Screen</div>
            <form method="POST" action="{{ route('booking.process') }}">
                @csrf
                <div class="seats">
                    @foreach(range('A', 'F') as $row)
                        @foreach(range(1, 10) as $col)
                            @php
                                $seatNumber = $row . $col;
                                $isBooked = in_array($seatNumber, $booked_seats);
                            @endphp
                            <div class="seat {{ $isBooked ? 'booked' : '' }}" 
                                data-seat="{{ $seatNumber }}" 
                                onclick="toggleSeat(this, '{{ $seatNumber }}')">
                                {{ $seatNumber }}
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <input type="hidden" name="seats" id="selected-seats">
                <input type="hidden" name="id" value="{{ $film->id }}">
                <input type="hidden" name="theater" value="{{ $theater }}">
                <input type="hidden" name="tanggal" value="{{ $date }}">
                <input type="hidden" name="waktu" value="{{ $time }}">
                <button type="submit" name="booked" class="book-btn">Book Now</button>
            </form>
        </div>

        <div class="booking-box">
            <h1>Booking Details</h1>
            <hr>
            <p><strong>Movie Title: </strong>{{ $film->judul }}</p>
            <hr>
            <p><strong>Theater: </strong>{{ $theater }}</p>
            <hr>
            <p><strong>Date: </strong>{{ $date }}</p>
            <hr>
            <p><strong>Time: </strong>{{ $time }}</p>
            <hr>
            <p><strong>Seats Selected: </strong><span id="amount">0</span></p>
            <hr>
            <p><strong>Total Price: </strong><span id="total">Rp 0</span></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let selectedSeats = [];
        let totalAmount = 0;
        const pricePerSeat = {{ $film->harga }};

        function toggleSeat(element, seat) {
            if (element.classList.contains('booked')) {
                alert('Kursi ini sudah dipesan!');
                return;
            }

            element.classList.toggle('selected');
            const index = selectedSeats.indexOf(seat);

            if (index > -1) {
                selectedSeats.splice(index, 1);
                totalAmount -= pricePerSeat;
            } else {
                selectedSeats.push(seat);
                totalAmount += pricePerSeat;
            }

            document.getElementById('selected-seats').value = selectedSeats.join(',');
            document.getElementById('amount').innerText = selectedSeats.length;
            document.getElementById('total').innerText = `Rp ${totalAmount}`;
        }
    </script>
</body>
</html>