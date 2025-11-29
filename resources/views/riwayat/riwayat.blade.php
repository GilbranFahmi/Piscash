<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi - Pisces Accessories</title>

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

h2 {
  font-family: 'Great Vibes', cursive;
  text-align: center;
  margin-top: 20px;
  font-size: 3rem;
  color: #58d6ff;
  text-shadow: 0 0 12px #58d6ff, 0 0 25px #58d6ff;
}

.table-container {
  background: rgba(10, 15, 40, 0.7);
  padding: 25px;
  border-radius: 20px;
  box-shadow: 0 0 25px rgba(88,214,255,0.3);
  border: 1px solid rgba(88,214,255,0.3);
  margin-top: 40px;
}


.btn-detail {
  background: linear-gradient(90deg, #FF3484, #56CCF2);
  border: none;
  padding: 6px 16px;
  color: white;
  font-weight: 600;
  border-radius: 25px;
  box-shadow: 0 0 12px rgba(88,214,255,0.8);
  transition: 0.3s ease;
}

.btn-detail:hover {
  transform: scale(1.05);
  box-shadow: 0 0 25px rgba(255,107,163,1);
}


.produk-img {
  width: 60px;
  height: 60px;
  border-radius: 10px;
  object-fit: cover;
  box-shadow: 0 0 8px #58d6ff88;
}

#detailModal .modal-content {
    background: rgba(255, 255, 255, 0.08) !important;
    backdrop-filter: blur(15px) !important;
    -webkit-backdrop-filter: blur(15px) !important;
    border: 1px solid rgba(255,255,255,0.25) !important;
    box-shadow: 0 0 25px rgba(86,204,242,0.5) !important;
    border-radius: 18px !important;
    color: #fff !important;
}
#detailModal .modal-header,
#detailModal .modal-footer {
    border-color: rgba(255,255,255,0.2) !important;
}


  </style>
</head>
<body>

@extends('layouts.main')

@section('title', 'Produk')

@section('content')

<div class="container">

    <h2>Riwayat Transaksi</h2>

    <div class="table-container">
        <table class="table table-dark table-striped text-center align-middle">
            <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Waktu</th>
                <th>Total</th>
                <th>Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($riwayat as $r)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $r->created_at->format('Y-m-d') }}</td>
                    <td>{{ $r->created_at->format('H:i') }}</td>
                    <td>Rp{{ number_format($r->total_harga,0,',','.') }}</td>
                    <td>
                        <button class="btn-detail" onclick="showDetail({{ $r->id }})">
                            Lihat Detail
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<div class="modal fade" id="detailModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Transaksi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body" id="modalBodyContent">
                <!-- AJAX isi di sini -->
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

    const IMG_BASE = "{{ asset('images/produk') }}";

    function showDetail(id) {

        $.get("/riwayat/detail/" + id, function (data) {

            let html = `
                <p><strong>ID Transaksi:</strong> #${data.id}</p>
                <p><strong>Tanggal:</strong> ${data.tanggal}</p>
               <p><strong>Waktu:</strong> ${data.waktu}</p>


                <hr>

                <h5>Daftar Produk:</h5>
                <div class='mt-3'>
            `;

            data.detail_transaksis.forEach(d => {

                let imgSrc = `${IMG_BASE}/${d.produk.gambar}`;

               html += `
    <div class="d-flex align-items-center mb-3 gap-3">
       <img src="{{ asset('') }}${d.produk.gambar}" class="produk-img">

        <div>
           <strong>${d.produk.nama_produk}</strong><br>
           ${d.jumlah}x @ Rp${Number(d.produk.harga).toLocaleString('id-ID')}<br>
           <span class="text-info">Subtotal: Rp${Number(d.subtotal).toLocaleString('id-ID')}</span>
        </div>
    </div>
`;
            });

            html += `
                </div>
                <hr>

                <h5>Total Transaksi:</h5>
                <p><strong>Rp${Number(data.total_harga).toLocaleString('id-ID')}</strong></p>

                <h5>Jumlah Bayar:</h5>
                <p>Rp${Number(data.jumlah_bayar ?? 0).toLocaleString('id-ID')}</p>

                <h5>Kembalian:</h5>
                <p>Rp${Number(data.kembalian ?? 0).toLocaleString('id-ID')}</p>
            `;

            $("#modalBodyContent").html(html);
            new bootstrap.Modal(document.getElementById('detailModal')).show();
        });
    }
</script>
@endsection

</body>
</html>
