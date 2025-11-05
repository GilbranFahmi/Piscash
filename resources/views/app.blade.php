<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Pisces Accessories')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: radial-gradient(circle at top, #05061a, #020312);
      color: #b3e9ff;
      font-family: 'Poppins', sans-serif;
    }
    .navbar {
      background: rgba(5,6,26,0.85);
      backdrop-filter: blur(8px);
      border-bottom: 1px solid rgba(255,255,255,0.1);
    }
    .navbar-brand {
      font-family: 'Great Vibes', cursive;
      font-size: 1.8rem;
      color: #b3e9ff !important;
      text-shadow: 0 0 10px #58d6ff, 0 0 20px #58d6ff;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .logo-img { height: 35px; width: auto; }
    .nav-link {
      color: #b3e9ff !important;
      font-weight: 500;
      margin: 0 8px;
      transition: 0.3s;
    }
    .nav-link:hover { color: #ff6ba3 !important; text-shadow: 0 0 6px #ff6ba3; }
    .nav-link.active { color: #ff6ba3 !important; text-shadow: 0 0 8px #ff6ba3; }
    .content-wrapper {
      margin-top: 120px;
      padding-bottom: 50px;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/home">
        <img src="{{ asset('images/logo5.png') }}" class="logo-img">
        Pisces Accessories
      </a>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center me-3">
          <li class="nav-item"><a href="/home" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/produk" class="nav-link">Produk</a></li>
          <li class="nav-item"><a href="/transaksi" class="nav-link {{ Request::is('transaksi') ? 'active' : '' }}">Transaksi</a></li>
          <li class="nav-item"><a href="/riwayat" class="nav-link">Riwayat</a></li>
          <li class="nav-item"><a href="/kategori" class="nav-link">Kategori</a></li>
          <li class="nav-item"><a href="/open-drawer" class="nav-link">Open Drawer</a></li>
          <li class="nav-item"><a href="/close-drawer" class="nav-link">Close Drawer</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="content-wrapper container">
    @yield('content')
  </div>
</body>
</html>
    