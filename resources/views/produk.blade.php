<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk - Pisces Accessories</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font -->
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #05061a;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
      padding-top: 100px;
    }

    /* Navbar */
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

.navbar-toggler {
  border: none;
  background: transparent;
}

.navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,255,255,0.8)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

/* Logout button */
.btn-logout {
  padding: 8px 28px;
  border-radius: 40px;
  font-weight: 600;
  border: 2px solid #ff2d75;
  background: transparent;
  color: #ff2d75;
  transition: 0.3s ease-in-out;
}

.btn-logout:hover {
  background: linear-gradient(90deg, #ff2d75, #56ccf2);
  color: #fff !important;
  border-color: transparent;
  box-shadow: 0 0 18px rgba(86, 204, 242, 0.7);
  transform: scale(1.05);
}

/* Hover: gradient glowing */
.btn-logout:hover {
    background: linear-gradient(90deg, #ff2d75, #56ccf2);
    color: #fff !important;
    border-color: transparent;
    box-shadow: 0 0 18px rgba(86, 204, 242, 0.7);
    transform: scale(1.05);
}


    /* Tombol Tambah */
    .btn-glow {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      color: white;
      font-weight: 600;
      border-radius: 50px;
      padding: 12px 40px;
      box-shadow: 0 0 15px rgba(88,214,255,0.6);
      transition: all 0.3s ease;
    }

    .btn-glow:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(88,214,255,0.9);
    }

    .produk-img {
      width: 60px;
      height: 60px;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: 0 0 8px #58d6ff88;
    }
  </style>
</head>

<body>
  <!-- ✅ Navbar -->
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

  <!-- ✅ Konten -->
  <div class="container mt-5">
    <h2 class="text-center mb-4" style="font-family:'Great Vibes',cursive;color:#58d6ff;">Kelola Produk</h2>

    @if(session('success'))
      <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <!-- Form Tambah -->
    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="mb-4">
      @csrf
      <div class="row g-3 align-items-center">
        <div class="col-md-3">
          <input type="text" name="nama_produk" class="form-control" placeholder="Nama Produk" required>
        </div>
        <div class="col-md-2">
          <input type="number" name="harga" class="form-control" placeholder="Harga" required>
        </div>
        <div class="col-md-2">
          <input type="number" name="stok" class="form-control" placeholder="Stok" required>
        </div>
        <div class="col-md-2">
          <select name="kategori_id" class="form-select" required>
            <option value="">Kategori</option>
            @foreach($kategori as $k)
              <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-md-2">
          <input type="file" name="gambar" class="form-control" accept="image/*">
        </div>
        <div class="col-md-1 text-end">
          <button type="submit" class="btn btn-glow w-100">+</button>
        </div>
      </div>
    </form>

    <!-- Tabel Produk -->
    <table class="table table-dark table-striped align-middle text-center">
      <thead>
        <tr>
          <th>#</th>
          <th>Gambar</th>
          <th>Nama Produk</th>
          <th>Kategori</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach($produks as $p)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>
           <img src="{{ asset($p->gambar) }}" alt="Gambar Produk" class="produk-img">
          </td>
          <td>{{ $p->nama_produk }}</td>
          <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
          <td>Rp{{ number_format($p->harga,0,',','.') }}</td>
          <td>{{ $p->stok }}</td>
          <td>
            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $p->id }}">Edit</button>
            <form action="{{ route('produk.destroy', $p->id) }}" method="POST" style="display:inline;">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus produk ini?')">Hapus</button>
            </form>
          </td>
        </tr>

        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content text-dark">
              <form action="{{ route('produk.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                  <h5 class="modal-title">Edit Produk</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                  @if($p->gambar)
                    <div class="mb-3 text-center">
                      <img src="{{ asset($p->gambar) }}" alt="Preview" style="width:80px;height:80px;border-radius:10px;object-fit:cover;">
                    </div>
                  @endif
                  <div class="mb-3">
                    <label>Nama Produk</label>
                    <input type="text" name="nama_produk" value="{{ $p->nama_produk }}" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label>Harga</label>
                    <input type="number" name="harga" value="{{ $p->harga }}" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label>Stok</label>
                    <input type="number" name="stok" value="{{ $p->stok }}" class="form-control" required>
                  </div>
                  <div class="mb-3">
                    <label>Ganti Gambar (opsional)</label>
                    <input type="file" name="gambar" class="form-control" accept="image/*">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endforeach
      </tbody>
    </table>
  </div>

  <!-- ✅ Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
