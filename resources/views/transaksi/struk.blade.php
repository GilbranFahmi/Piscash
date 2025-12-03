<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Transaksi - Pisces Accessories</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <style>
    body {
      background: #05061a;
      color: #fff;
      font-family: 'Poppins', sans-serif;
      padding: 35px;
    }

    .struk-container {
      background: rgba(255,255,255,0.03);
      border-radius: 15px;
      padding: 25px;
      max-width: 600px;
      margin: auto;
      text-align: center;
      border: 1px solid rgba(255,255,255,0.08);
    }

    .header-logo {
      font-family: 'Great Vibes', cursive;
      font-size: 28px;
      color: #58d6ff;
      text-shadow: 0 0 10px #58d6ff;
    }

    .alamat {
      font-size: 12px;
      opacity: .85;
      margin-top: -5px;
      margin-bottom: 10px;
      line-height: 1.4;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
      margin-bottom: 15px;
      font-size: 14px;
    }

    th, td {
      border: 1px solid #000;
      padding: 6px;
      background: rgba(255,255,255,0.15);
      color: #000;
    }

    th {
      background: rgba(255,255,255,0.25);
      font-weight: 600;
      color: #000;
    }

    .text-end {
      text-align: right !important;
      margin-right: 10px;
    }

    button {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      padding: 10px 25px;
      border-radius: 25px;
      font-weight: 600;
      margin-top: 10px;
      box-shadow: 0 0 10px #56CCF2;
      color: #fff;
    }

    .btn-back {
      position: fixed;
      top: 20px;
      left: 20px;
      background: transparent;
      border: 2px solid #56CCF2;
      padding: 8px 20px;
      color: #56CCF2;
      border-radius: 30px;
      font-weight: 600;
      box-shadow: 0 0 10px #56CCF2;
      transition: .25s;
    }

    .btn-back:hover {
      background: #56CCF2;
      color: #000;
      transform: scale(1.05);
    }

    @media print {
      body {
        background: white;
        color: black;
        padding: 0;
      }
      .struk-container {
        background: white;
        border: none;
        color: black;
        box-shadow: none;
      }
      button, .btn-back {
        display: none !important;
      }
      th, td {
        background: white;
        color: black;
        border: 1px solid black;
      }
      .header-logo {
        color: black !important;
        text-shadow: none;
      }
    }
  </style>
</head>
<body>

  <button class="btn-back" onclick="window.location.href='/transaksi'">
    ← Kembali ke Transaksi
  </button>

  <div class="struk-container">

    <div class="header-logo">Pisces Accessories</div>
    <div class="alamat">
      Mall Paskal Hyper Square, Lantai 2, Blok D-05<br>
      Jl. Pasirkaliki No. 25-27, Kebon Kawung, Cicendo<br>
      Bandung, Jawa Barat, 40171
    </div>

    <p><strong>ID Transaksi:</strong> {{ $transaksi->kode_qr }}</p>
    <p><strong>Tanggal:</strong> {{ $transaksi->created_at->format('d M Y H:i') }}</p>
    <p><strong>Metode Pembayaran:</strong> {{ $metode }}</p>

    <table>
      <thead>
        <tr>
          <th>Produk</th>
          <th>Qty</th>
          <th>Harga</th>
          <th>Subtotal</th>
        </tr>
      </thead>
      <tbody>
        @foreach($transaksi->detailTransaksis as $d)
        <tr>
          <td>{{ $d->produk->nama_produk }}</td>
          <td>{{ $d->jumlah }}</td>
          <td>Rp{{ number_format($d->produk->harga, 0, ',', '.') }}</td>
          <td>Rp{{ number_format($d->subtotal, 0, ',', '.') }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>

    <h6 class="text-end fw-bold">Total: Rp{{ number_format($transaksi->total_harga, 0, ',', '.') }}</h6>
    <h6 class="text-end" style="color:green;">
      Jumlah Bayar: Rp{{ number_format($transaksi->jumlah_bayar, 0, ',', '.') }}
    </h6>
    <h6 class="text-end" style="color:rgb(255, 170, 26);">
      Kembalian: Rp{{ number_format($transaksi->kembalian, 0, ',', '.') }}
    </h6>

    <hr>

   <img 
  src="https://api.qrserver.com/v1/create-qr-code/?size=140x140&data={{ $transaksi->kode_qr }}" 
  alt="QR Code"
  style="width:140px;margin-top:10px;">

    <p style="font-size:12px;opacity:.75;margin-top:5px;">
      Scan untuk detail transaksi
    </p>

    <button onclick="window.print()">Cetak Struk</button>

  </div>

</body>
</html>
