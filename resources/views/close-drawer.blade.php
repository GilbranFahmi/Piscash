<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Close Drawer - Pisces Accessories</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      background-color: #05061a;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      padding-top: 100px;
      overflow-x: hidden;
    }

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

    .logo-img { height: 35px; width: auto; }
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

    .drawer-card {
      background: rgba(10, 15, 40, 0.75);
      padding: 25px;
      border-radius: 15px;
      border: 1px solid #56CCF2;
      box-shadow: 0 0 18px rgba(88,214,255,0.3);
    }

    .summary-box {
      background: rgba(5,10,25,0.7);
      padding: 16px;
      border-radius: 12px;
      border: 1px solid #56CCF2;
    }

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

    .form-card {
      background: rgba(5,10,25,0.6);
      border-radius: 12px;
      padding: 28px;
      border: 1px solid rgba(88,214,255,0.35);
      box-shadow: 0 0 40px rgba(88,214,255,0.05);
    }

    table td, table th {
      vertical-align: middle;
    }
  </style>

</head>
<body>

<!-- NAVBAR -->
@extends('layouts.main')

@section('title', 'Produk')

@section('content')

<!-- TITLE -->
<h2 class="text-center mt-3" style="font-family:'Great Vibes'; color:#58d6ff; text-shadow:0 0 15px #58d6ff; font-size:2.7rem;">
  Close Drawer
</h2>

<div class="container mt-4">

  <!-- INFO DRAWER -->
  <div class="drawer-card mb-4">
    <div class="row">
      <div class="col-md-6">
        <p><strong>Nama Kasir:</strong> {{ $kasir->nama }}</p>
        <p><strong>Waktu Dibuka:</strong> {{ $waktu_buka }}</p>
      </div>
      <div class="col-md-6 text-end">
        <p><strong>Uang Modal:</strong> Rp {{ number_format($saldo_awal,0,',','.') }}</p>
        <p><strong>Status:</strong> <span class="text-success">Aktif</span></p>
      </div>
    </div>
  </div>

  <div class="text-center mb-4">
    <button class="btn-glow" data-bs-toggle="modal" data-bs-target="#modalCloseDrawer">
      Tutup Drawer
    </button>
  </div>

  <div class="row">

    <!-- SUMMARY -->
    <div class="col-md-4">
      <div class="summary-box">
        <h5>Ringkasan Drawer</h5>
        <p><strong>Uang Modal:</strong> Rp {{ number_format($saldo_awal,0,',','.') }}</p>
        <p><strong>Total Sales:</strong> Rp {{ number_format($total_masuk,0,',','.') }}</p>
        <p><strong>Saldo Akhir:</strong> Rp {{ number_format($saldo_awal + $total_masuk,0,',','.') }}</p>
      </div>
    </div>

    <!-- TRANSAKSI -->
    <div class="col-md-8">
      <table class="table table-dark table-striped text-center mb-4">
        <thead>
          <tr>
            <th>No</th>
            <th>ID Transaksi</th>
            <th>Tanggal</th>
            <th>Waktu</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @forelse($transaksi as $t)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $t->kode_qr }}</td>
            <td>{{ $t->created_at->format('Y-m-d') }}</td>
            <td>{{ $t->created_at->format('H:i') }}</td>
            <td>Rp{{ number_format($t->total_harga,0,',','.') }}</td>
          </tr>
          @empty
          <tr><td colspan="5">Tidak ada transaksi hari ini</td></tr>
          @endforelse
        </tbody>
      </table>

      <!-- RIWAYAT CLOSE DRAWER -->
      <table class="table table-dark table-striped text-center">
        <thead>
          <tr>
            <th>Tanggal</th>
            <th>Kasir</th>
            <th>Saldo Akhir</th>
          </tr>
        </thead>
        <tbody>
          @forelse($closeList as $r)
          <tr>
            <td>{{ $r->waktu_tutup }}</td>
            <td>{{ $r->kasir->nama }}</td>
            <td>Rp{{ number_format($r->saldo_akhir,0,',','.') }}</td>
          </tr>
          @empty
          <tr><td colspan="6">Belum ada riwayat close drawer</td></tr>
          @endforelse
        </tbody>
      </table>

    </div>
  </div>
</div>

<!-- MODAL CLOSE DRAWER -->
<div class="modal fade" id="modalCloseDrawer" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content text-dark">
      <form action="{{ route('close-drawer.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi Tutup Drawer</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>

        <div class="modal-body">
          <div class="form-card">
            <p><strong>Uang Modal:</strong> Rp {{ number_format($saldo_awal,0,',','.') }}</p>
            <p><strong>Total Sales:</strong> Rp {{ number_format($total_masuk,0,',','.') }}</p>
            <p><strong>Saldo Akhir:</strong> Rp {{ number_format($saldo_awal + $total_masuk,0,',','.') }}</p>
          </div>
        </div>

        <div class="modal-footer">
          <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button class="btn btn-primary" type="submit">Tutup Drawer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

@endsection

</body>
</html>
