<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Open Drawer - Pisces Accessories</title>

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

    /* NAVBAR */
    /* NAVBAR */
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

.navbar-nav .nav-link {
    font-family: 'Poppins', sans-serif !important;
    font-size: 1rem !important;
    font-weight: 600;
}

.nav-link.active:hover {
  color: #56CCF2 !important;
  text-shadow: 0 0 8px #56CCF2;
}

   .nav-link:hover {
  color: #FF3484 !important;
  text-shadow: 0 0 8px #FF3484;
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

    /* Info Card */
    .drawer-card {
      background: rgba(10, 15, 40, 0.7);
      padding: 25px;
      border-radius: 15px;
      border: 1px solid #56CCF2;
      box-shadow: 0 0 18px rgba(88,214,255,0.3);
    }

    /* Glow Button */
    .btn-glow {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      color: white;
      border: none;
      border-radius: 30px;
      padding: 10px 25px;
      font-weight: 600;
      box-shadow: 0 0 12px rgba(88,214,255,0.7);
      transition: .3s;
    }
    .btn-glow:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(255,107,163,1);
    }

    table {
      border-radius: 12px;
      overflow: hidden;
      border: 1px solid #56CCF2;
      box-shadow: 0 0 18px rgba(88,214,255,0.3);
    }
    th {
      color: #58d6ff;
      font-weight: 600;
      text-shadow: 0 0 8px #58d6ff;
    }

    /* Modal */
    .modal-content {
      border-radius: 15px;
      border: 1px solid #56CCF2;
      box-shadow: 0 0 25px rgba(88,214,255,0.4);
    }
    .btn-primary {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      font-weight: 600;
      box-shadow: 0 0 12px rgba(88,214,255,0.7);
    }
    .btn-primary:hover {
      transform: scale(1.05);
      box-shadow: 0 0 25px rgba(255,107,163,1);
    }
  </style>
</head>

<body>

  <!-- NAVBAR -->
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

  <!-- TITLE -->
  <h2 class="text-center mt-3"
      style="font-family:'Great Vibes';color:#58d6ff;text-shadow:0 0 15px #58d6ff;font-size:2.7rem;">
      Open Drawer
  </h2>

  <div class="container mt-4">

    <!-- Drawer Info -->
    <div class="drawer-card mb-4">
      <div class="row">
        <div class="col-md-6">
          <p><strong>Nama Kasir:</strong> {{ $kasir->nama }}</p>
          <p><strong>Waktu Dibuka:</strong> {{ $waktu_buka ?? '-' }}</p>
        </div>
        <div class="col-md-6">
          <p><strong>Saldo Awal Drawer:</strong> Rp {{ number_format($saldo_awal ?? 0,0,',','.') }}</p>
          <p><strong>Status:</strong> <span class="text-success">Aktif</span></p>
        </div>
      </div>
    </div>

    <div class="text-center mb-3">
      <button class="btn-glow" data-bs-toggle="modal" data-bs-target="#modalOpenDrawer">
        + Tambah Drawer
      </button>
    </div>

    <!-- TABLE -->
    <table class="table table-dark table-striped text-center">
      <thead>
        <tr>
          <th>No</th>
          <th>ID Transaksi</th>
          <th>Tanggal</th>
          <th>Waktu</th>
          <th>Kasir</th>
          <th>Total</th>
        </tr>
      </thead>

     <tbody>
@foreach($transaksi as $t)
<tr>
    <td>{{ $loop->iteration }}</td>

    <!-- ID Transaksi -->
    <td>{{ $t->kode_qr }}</td>

    <!-- Tanggal -->
    <td>{{ \Carbon\Carbon::parse($t->created_at)->format('Y-m-d') }}</td>

    <!-- Waktu (WIB) -->
    <td>{{ \Carbon\Carbon::parse($t->created_at)->setTimezone('Asia/Jakarta')->format('H:i') }}</td>

    <!-- Nama Kasir -->
    <td>{{ $t->kasir->nama }}</td>

    <!-- Total Harga -->
    <td>Rp{{ number_format($t->total_harga, 0, ',', '.') }}</td>
</tr>
@endforeach
</tbody>
    </table>

  </div>


  <!-- MODAL TAMBAH DRAWER -->
  <div class="modal fade" id="modalOpenDrawer" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content text-dark">

        <form action="{{ route('open-drawer.store') }}" method="POST">
          @csrf

          <div class="modal-header">
            <h5 class="modal-title">Buka Drawer Baru</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body">

            <div class="mb-3">
              <label class="form-label">Saldo Awal Drawer (Rp)</label>
              <input type="number" name="saldo_awal"
                     class="form-control"
                     placeholder="Masukkan saldo awal"
                     required>
            </div>

            <div class="alert alert-info">
              Drawer baru akan langsung berstatus <strong>Aktif</strong>.
            </div>

          </div>

          <div class="modal-footer">
            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <button class="btn btn-primary" type="submit">Buka Drawer</button>
          </div>

        </form>

      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
