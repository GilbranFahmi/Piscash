<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Pisces Accessories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #05061a;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
            padding-top: 100px;
        }

        /* ========== NAVBAR (COPY PUNYAMU) ========== */
        .navbar {
          background: rgba(5, 6, 26, 0.85);
          backdrop-filter: blur(8px);
          border-bottom: 1px solid rgba(255,255,255,0.1);
        }
        .navbar-brand {
          font-family: 'Great Vibes', cursive;
          font-size: 1.8rem;
          color: #b3e9ff !important;
          text-shadow: 0 0 10px #58d6ff, 0 0 20px #58d6ff;
        }
        .nav-link {
          color: #56CCF2 !important;
          font-weight: 500;
          text-shadow: 0 0 6px #56CCF2;
        }
        .nav-link.active {
          color: #FF3484 !important;
          text-shadow: 0 0 8px #FF3484;
        }
        .btn-logout {
          padding: 8px 28px;
          border-radius: 40px;
          font-weight: 600;
          border: 2px solid #ff2d75;
          background: transparent;
          color: #ff2d75;
          transition: 0.3s;
        }
        .btn-logout:hover {
          background: linear-gradient(90deg, #ff2d75, #56ccf2);
          color: #fff !important;
        }

    </style>

    @stack('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/home">
        <img src="{{ asset('images/logo5.png') }}" class="logo-img" style="height:35px;">
        Pisces Accessories
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav align-items-center me-3">
          <li class="nav-item"><a href="/home" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="/produk" class="nav-link active">Produk</a></li>
          <li class="nav-item"><a href="/transaksi" class="nav-link">Transaksi</a></li>
          <li class="nav-item"><a href="/riwayat" class="nav-link active">Riwayat</a></li>
          <li class="nav-item"><a href="/kategori" class="nav-link">Kategori</a></li>
          <li class="nav-item"><a href="/open-drawer" class="nav-link active">Open Drawer</a></li>
          <li class="nav-item"><a href="/close-drawer" class="nav-link">Close Drawer</a></li>
        </ul>

        <!-- Tombol Logout -->
        <button class="btn btn-logout" data-bs-toggle="modal" data-bs-target="#logoutModal">
            Logout
        </button>

      </div>
    </div>
</nav>

{{-- ========== KONTEN HALAMAN ========== --}}
<div class="container mt-4">
    @yield('content')
</div>

{{-- ========== MODAL LOGOUT (SAMA SEPERTI YANG KITA BUAT) ========== --}}
<div class="modal fade" id="logoutModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content"
         style="background: rgba(10,15,40,0.95); border:1px solid #56CCF2; color:#fff; border-radius:20px;">
      <div class="modal-header">
        <h5 class="modal-title" style="color:#58d6ff;">Konfirmasi Logout</h5>
        <button class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body text-center">
        <p>Apakah kamu yakin ingin keluar?</p>
      </div>

      <div class="modal-footer justify-content-between">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>

        <form action="{{ route('logout') }}" method="GET">
            <button class="btn"
                    style="background:linear-gradient(90deg,#FF3484,#56CCF2);color:white;">
              Ya, Logout
            </button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
