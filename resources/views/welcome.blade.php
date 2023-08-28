<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pelelangan Online</title>
  <!-- Link ke Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Link ke Font Awesome untuk ikon -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Link ke Google Fonts - Font Poppins -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <!-- Tambahkan CSS kustom di bawah ini -->
  <style>
    /* CSS kustom untuk membuat logo */
    .logo {
      font-family: 'Segoe UI', sans-serif;
      font-size: 36px;
      font-weight: bold;
      color: #black; /* Coral Red */
      text-transform: uppercase;
      padding: 15px 0;
    }

    /* CSS kustom untuk bagian utama halaman */
    .jumbotron {
      background-image: url('');
      background-size: cover;
      background-position: center;
      padding: 200px 0;
      color: black;
      text-align: center;
    }

    /* CSS kustom untuk tombol "Mulai Pelelangan" */
    .btn-mulai-pelelangan {
      font-size: 20px;
      padding: 15px 30px;
      border-radius: 30px;
      background-color: #FF6F61; /* Coral Red */
      color: #fff;
      border: none;
    }
    .btn-mulai-pelelangan:hover {
      background-color: #FFB18F; /* Light Coral */
    }

    /* CSS kustom untuk fitur-fitur lainnya */
    .fitur {
      padding: 50px 0;
      text-align: center;
    }
    .fitur .icon {
      font-size: 40px;
      margin-bottom: 20px;
      color: #FF6F61; /* Coral Red */
    }
    .fitur h3 {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
      color: #FF6F61; /* Coral Red */
    }
    .fitur p {
      font-size: 16px;
      color: #888;
    }

    /* CSS kustom untuk navbar */
    .navbar {
      background-color: #FF6F61; /* Coral Red */
      padding: 0px 0;
    }
    .navbar-brand {
      font-size: 24px;
      font-weight: bold;
      color: #fff;
    }
    .navbar .nav-item {
      margin-top: 10px;
      margin-right: 20px;
    }
    .navbar .nav-item a {
      font-size: 18px;
      color: #fff;
      transition: color 0.3s ease;
    }
    .navbar .nav-item a:hover {
      color: #FFB18F; /* Light Coral */
    }
    .navbar .nav-items {
      margin-top: 10px;
      margin-right: 450px;
    }
    .navbar .nav-items a {
      font-size: 18px;
      color: #fff;
      transition: color 0.3s ease;
    }
    .navbar .nav-items a:hover {
      color: #FFB18F; /* Light Coral */
    }
    .navbar-toggler {
      margin-top: 10px;
      border: 10px;
      outline: none;
      color: #fff;
      font-size: 24px;
      transition: color 0.3s ease;
    }

    .navbar-toggler:hover {
      color: white; /* Light Coral */
    }
    .navbar-scroll .navbar {
      background-color: #F2F2F2; /* Light Gray */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .navbar-scroll .navbar-brand,
    .navbar-scroll .navbar .nav-item a {
      color: #000; /* Black */
    }
    .navbar-scroll .navbar-toggler {
      color: #000; /* Black */
    }
    .logo-icon {
      margin-right: 10px;
    }

    .about-us-section {
      padding: 15px 0;
      text-align: center;
    }
    .about-us-section h2 {
      font-size: 36px;
      font-weight: bold;
      color: #FF6F61; /* Coral Red */
      margin-bottom: 20px;
    }
    .about-us-section p {
      font-size: 18px;
      color: #888;
    }
    .about-us-section h2 {
        color: black;
    }

    /* CSS kustom untuk halaman barang pelelangan */
    .container {
      padding: 30px 0;
    }
    .container h2 {
      text-align: center;
      font-size: 36px;
      font-weight: bold;
      color: #black; /* Coral Red */
      margin-bottom: 20px;
    }
    .barang {
      border: 1px solid #FF6F61; /* Coral Red */
      padding: 20px;
      border-radius: 5px;
      margin-bottom: 20px;
    }
    .barang h3 {
      font-size: 24px;
      font-weight: bold;
      color: #FF6F61; /* Coral Red */
    }
    .barang p {
      font-size: 16px;
    }
    .judul-teks {
      font-family: 'Poppins', sans-serif;
      font-size: 28px;
      font-weight: bold;
      color: #333; /* Warna teks sesuai preferensi Anda */
    }

    /* CSS kustom untuk footer */
    footer {
      padding: 20px 0;
      background-color: #F2F2F2;
      color: #fff;
      text-align: center;
      text-decoration: none;
      box-shadow: inset 0 0 2px rgba(0, 0, 0, 0.5);
    }
    footer h4 {
      font-weight: bold;
      color: #black
    }
    .deskripsi {
    width: 100%; /* Atur lebar sesuai kebutuhan */
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis; /* Tambahkan "..." jika konten terpotong */
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-md fixed-top navbar-scroll">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fas fa-gavel logo-icon"></i>
        <span class="logo">Pelelangan</span> Online
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icom"><i class="fas fa-bars"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Home</a>
          </li>
            <li class="nav-items">
                <a class="nav-link" href="{{ route('login') }}">Pelelangan</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest <!-- Check if user is a guest (not logged in) -->
            <li class="nav-item">
              <a href="{{ route('login') }}" class="nav-link">Login</a>
            </li>
            <li class="nav-item">
              <a href="{{ route('register') }}" class="nav-link">Daftar</a>
            </li>
          @else <!-- If user is logged in -->
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link">Logout</a>
            </li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <!-- Jumbotron - Bagian utama halaman -->
  <div class="jumbotron">
    <div class="container text-black" style="font-family: 'Poppins', sans-serif;">
      <h1>Selamat Datang di Pelelangan Online</h1>
      <p>Temukan barang-barang unik dan langka di pelelangan kami.</p>
            <div class="container">
                @guest <!-- Check if user is a guest (not logged in) -->
                <a href="{{ route('login') }}" class="btn btn-mulai-pelelangan">Log in</a>
                <a href="{{ route('register') }}" class="btn btn-mulai-pelelangan">Daftar</a>
                @else <!-- If user is logged in -->
                <a href="#" class="btn btn-mulai-pelelangan">Mulai Pelelangan</a>
                @endguest
            </div>
    </div>
  </div>

 <!-- Halaman Barang Pelelangan -->
 <div class="container">
    <h2>Barang Lelang</h2>
    <div class="row">

      @foreach  ($barang as $row)
      <div class="col-lg-4">
        <div class="barang">
            <div class="card shadow-lg">
                <div class="gambar">
                    <img src="{{ $row->foto }}" class="card-img-top shadow-lg"  width="280" height="300" alt="Barang Pelelangan">
                </div>
            <div class="container">
            <div class="card-body">
            <h3 class="text-center">{{ $row->nama_barang }}</h3>
            <p>{{ currency_IDR($row->harga_awal) }}</p>
            <p><i class="fas fa-calendar-alt"></i> {{ date('d M Y', strtotime($row->tanggal)) }}</p>
                <p><i class="fas fa-quote-left"></i> {{ $row->deskripsi }}</p>
                <button type="button" class="btn btn-outline-dark" data-mdb-ripple-color="dark">Mulai Lelang</button>
            </div>
            </div>
         </div>
        </div>
      </div>
        @endforeach

    </div>
  </div>
  </div>


 <!-- about lelang -->
  <div class="about-us-section">
    <div class="container">
      <h2>Tentang Kami</h2>
      <p>
        Pelelangan Online adalah platform pelelangan daring yang menyediakan berbagai jenis barang unik dan langka. Kami berkomitmen untuk memberikan pengalaman pelelangan terbaik bagi para pengguna kami.
      </p>
      <p>
        Dengan ribuan barang lelang yang tersedia, Anda dapat menemukan koleksi antik, perangkat elektronik terbaru, fashion terkini, serta berbagai barang langka dari seluruh dunia. Tim kami selalu bekerja keras untuk memastikan keamanan dan kenyamanan dalam setiap transaksi.
      </p>
      <p>
        Bergabunglah dengan Pelelangan Online dan temukan barang-barang unik serta langka dengan penawaran terbaik. Ikuti pelelangan langsung dan tawar sesuai kemampuanmu. Selamat berlelang dan selamat berbelanja!
      </p>
    </div>
  </div>

 <!-- Fitur-fitur -->
 <div class="container">
    <div class="row fitur">
      <div class="col-lg-4">
        <i class="icon fas fa-gavel"></i>
        <h3>Pelelangan Langsung</h3>
        <p>Ikuti pelelangan langsung dan dapatkan barang idamanmu.</p>
      </div>
      <div class="col-lg-4">
        <i class="icon fas fa-gem"></i>
        <h3>Barang Unik</h3>
        <p>Temukan barang-barang unik dan langka dari seluruh dunia.</p>
      </div>
      <div class="col-lg-4">
        <i class="icon fas fa-dollar-sign"></i>
        <h3>Tawar Sesuai Budget</h3>
        <p>Tentukan batas budgetmu dan tawar sesuai kemampuanmu.</p>
      </div>
    </div>
    <div class="row fitur">
      <div class="col-lg-4">
        <i class="icon fas fa-shipping-fast"></i>
        <h3>Pengiriman Cepat</h3>
        <p>Nikmati pengiriman cepat dan aman ke seluruh Indonesia.</p>
      </div>
      <div class="col-lg-4">
        <i class="icon fas fa-heart"></i>
        <h3>Dukungan Penuh</h3>
        <p>Kami siap membantu dan memberikan dukungan penuh untukmu.</p>
      </div>
      <div class="col-lg-4">
        <i class="icon fas fa-lock"></i>
        <h3>Transaksi Aman</h3>
        <p>Jaminan keamanan transaksi dan data pribadi.</p>
      </div>
    </div>
  </div>

  <div class="container">
    <h2 class="judul-teks">Buat akun dan mulai Beli, Tawar, atau Jual Sekarang!</h2>
  </div>
  @if (Route::has('login'))
  <div class="container text-center">
      @auth
      @else
          @if (Route::has('register'))
              <a href="{{ route('register') }}" class="btn btn-mulai-pelelangan">Daftar</a>
          @endif
      @endauth
  </div>
@endif

<footer class="footer text-dark">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h4>Lelang</h4>
          <div class="footer-links text-center">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae nemo minima qui dolor, iusto iure.</p>
          </div>
          <a href="#" class="btn btn-primary">Learn More</a>
        </div>
        <div class="col-lg-4">
          <h4 >Solusi</h4>
          <ul class="footer-links text-left">
            <li><a href="#">Register</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Buy</a></li>
            <li><a href="#">Sell</a></li>
            <li><a href="#">Submit a bid</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
          <h4>Pelayanan</h4>
          <ul class="footer-links text-left">
            <li><a href="#">Register</a></li>
            <li><a href="#">Login</a></li>
            <li><a href="#">Buy</a></li>
            <li><a href="#">Sell</a></li>
            <li><a href="#">Submit a bid</a></li>
          </ul>
        </div>
      </div>
      <div class="row mt-4">
        <div class="col-lg-4">
          <h4>Kontak</h4>
          <ul class="footer-links text-left">
          <li>Email: contact@lelelanganonline.com</li>
          <li>phone: +1234567890</li>
        </ul>
        </div>
        <div class="col-lg-4">
          <h4>Help Center</h4>
          <ul class="footer-links text-left">
            <li><a href="#">Support Community</a></li>
            <li><a href="#">Press</a></li>
            <li><a href="#">Share Your Story</a></li>
          </ul>
        </div>
        <div class="col-lg-4">
            <h4>Our Supporters</h4>
            <div class="footer-links text-center">
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
            </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Footer -->
  <div class="bg-white text-secondary">
    <div class="container text-center">
      <p>Hak Cipta &copy; 2023 Pelelangan Online. All rights reserved.</p>
    </div>
</div>

  <!-- Link ke JavaScript Bootstrap dan jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


