<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Transaksi - Pisces Accessories</title>

  <!-- Bootstrap & Fonts -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      background: #05061a;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      padding: 40px;
    }

    .struk-container {
      background: rgba(5,10,25,0.85);
      box-shadow: 0 0 15px #58d6ff55;
      border-radius: 20px;
      max-width: 600px;
      margin: auto;
      padding: 30px;
    }

    h4 {
      font-family: 'Great Vibes', cursive;
      color: #58d6ff;
      text-shadow: 0 0 12px #58d6ff;
    }

    th {
      color: #ff6ba3;
    }

    button {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      color: white;
      border-radius: 30px;
      padding: 10px 25px;
      margin-top: 10px;
      font-weight: bold;
      box-shadow: 0 0 12px #56CCF2;
    }

    button:hover {
      transform: scale(1.05);
      box-shadow: 0 0 18px #56CCF2;
    }

    hr {
      border-color: rgba(255,255,255,0.1);
    }

    @media print {
      button { display: none; }
      body { background: white; color: black; }
      .struk-container { box-shadow: none; background: white; color: black; }
      th { color: black !important; }
    }


.btn-back {
  position: fixed;
  top: 20px;
  left: 20px;
  background: transparent;
  border: 2px solid #56CCF2;
  color: #56CCF2;
  padding: 8px 20px;
  border-radius: 30px;
  font-weight: 600;
  z-index: 9999;
  box-shadow: 0 0 12px #56CCF2;
  transition: 0.3s;
}

.btn-back:hover {
  background: #56CCF2;
  color: #000;
  transform: scale(1.05);
}

@media print {
  .btn-back {
    display: none !important;
  }
}


  </style>
</head>
<body>

  <div class="struk-container">
    <h4 class="text-center mb-3">Pisces Accessories</h4>

    <p><strong>ID Transaksi:</strong> #{{ $transaksi->id }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d M Y H:i') }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ $metode }}</p>

    <hr>

  
    <table class="table table-dark table-bordered text-center align-middle">
      <thead>
        <tr>
          <th>Produk</th>
          <th>Qty</th>
          <th>Harga</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($transaksi->detailTransaksis as $d)
        <tr>
          <td>{{ $d->produk->nama_produk ?? '-' }}</td>
          <td>{{ $d->jumlah }}</td>
          <td>Rp{{ number_format($d->produk->harga ?? 0, 0, ',', '.') }}</td>
          <td>Rp{{ number_format($d->subtotal, 0, ',', '.') }}</td>
        </tr>
        @empty
        <tr><td colspan="4">Tidak ada data produk.</td></tr>
        @endforelse
      </tbody>
    </table>

  
    <div class="mt-4">
      <h5 class="text-end">Total: Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</h5>
      <h6 class="text-end text-success">
        Jumlah Bayar: Rp{{ number_format($transaksi->jumlah_bayar ?? 0, 0, ',', '.') }}
      </h6>
      <h6 class="text-end text-warning">
        Kembalian: Rp{{ number_format($transaksi->kembalian ?? 0, 0, ',', '.') }}
      </h6>
    </div>

    <hr>

    <div class="text-center mt-3">

      <img 
        src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=Transaksi%20{{ $transaksi->id }}%20-%20Total%20Rp{{ $transaksi->total_harga }}" 
        alt="QR Code" 
        style="width:130px;">
      <p style="font-size:0.9em;opacity:0.8;">Scan untuk detail transaksi</p>

      <button onclick="window.print()">Cetak Struk</button>
    </div>
  </div>

</body>
<button class="btn-back" onclick="window.location.href='/transaksi'">
  ← Kembali ke Transaksi
</button>

</html>
