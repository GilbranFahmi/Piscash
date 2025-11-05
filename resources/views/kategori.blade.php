<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori Produk - Pisces Accessories</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
  <style>
    body {
      background-color: #05061a;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
      padding-top: 100px;
    }

    /* === Navbar === */
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
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .logo-img {
      height: 35px;
      width: auto;
    }

    .nav-link {
      color: #56CCF2 !important;
      font-weight: 500;
      margin: 0 8px;
      transition: all 0.3s ease;
      text-shadow: 0 0 6px #56CCF2;
    }

    .nav-link.active {
      color: #FF3484 !important;
      text-shadow: 0 0 8px #FF3484;
    }

    .nav-link:hover {
      color: #FF3484 !important;
      text-shadow: 0 0 8px #FF3484;
    }

    .nav-link.active:hover {
      color: #56CCF2 !important;
      text-shadow: 0 0 8px #56CCF2;
    }

    .btn-logout {
      border: 1px solid #FF3484;
      color: #FF3484;
      border-radius: 20px;
      padding: 6px 20px;
      transition: 0.3s;
    }

    .btn-logout:hover {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      color: #fff !important;
      box-shadow: 0 0 15px #56CCF2;
      border: none;
      transform: scale(1.05);
    }

    /* === Kontainer utama === */
    .container-box {
      background: rgba(10,15,40,0.8);
      box-shadow: 0 0 25px rgba(88,214,255,0.3);
      border-radius: 20px;
      padding: 30px;
      margin-top: 40px;
      max-width: 700px;
    }

    .btn-glow {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      color: #fff;
      font-weight: 600;
      border-radius: 50px;
      padding: 8px 25px;
      transition: 0.3s;
      box-shadow: 0 0 15px rgba(88,214,255,0.6);
    }

    .btn-glow:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(88,214,255,0.9);
    }

    table {
      color: #fff;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/home">
        <img src="{{ asset('images/logo5.png') }}" alt="Logo" class="logo-img">
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

        <form action="{{ route('logout') }}" method="GET">
          <button type="submit" class="btn btn-logout">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <div class="container container-box">
    <h2 class="text-center mb-4" style="font-family:'Great Vibes',cursive;color:#58d6ff;">
      Kelola Kategori
    </h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('kategori.store') }}" method="POST" class="mb-4">
      @csrf
      <div class="input-group">
        <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" required>
        <button type="submit" class="btn btn-glow">Tambah</button>
      </div>
    </form>

    <table class="table table-dark table-striped align-middle text-center">
      <thead>
        <tr>
          <th>#</th>
          <th>Nama Kategori</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($kategori as $k)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $k->nama_kategori }}</td>
          <td>
            <form action="{{ route('kategori.destroy', $k->id) }}" method="POST"
              onsubmit="return confirm('Hapus kategori ini?')" style="display:inline;">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm">Hapus</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
