<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Produk - Pisces Accessories</title>

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
      transition: 0.3s;
    }

    .btn-logout:hover {
      background: linear-gradient(90deg, #ff2d75, #56ccf2);
      color: #fff !important;
      box-shadow: 0 0 18px rgba(86,204,242,0.7);
      transform: scale(1.05);
    }

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

    .produk-img {
      width: 60px;
      height: 60px;
      border-radius: 10px;
      object-fit: cover;
      box-shadow: 0 0 8px #58d6ff88;
    }

    .neon-alert {
    border-radius: 10px;
    font-weight: 600;
    box-shadow: 0 0 12px rgba(88,214,255,0.5);
    margin-bottom: 25px;
}

/* Hilangkan white glow default input focus */
.modal-content input:focus,
.modal-content select:focus,
.modal-content textarea:focus {
    background: #081027 !important;
    color: #b3e9ff !important;
    border: 1px solid #56CCF2 !important;
    outline: none !important;
    box-shadow: 0 0 10px rgba(86,204,242,0.7);
}

/* Perbaiki backdrop putih berlebihan */
.modal-backdrop.show {
    background-color: rgba(0, 0, 0, 0.75) !important;
    backdrop-filter: blur(2px); /* opsional */
}

/* Stabilkan modal agar tidak ikut brightening */
.modal-content {
    background: rgba(5, 6, 26, 0.95) !important;
    border: 1px solid #56CCF2 !important;
}



.modal-header, 
.modal-footer {
    background: transparent !important;
    border-color: rgba(255, 255, 255, 0.12) !important;
    color: #ffffff !important;
}


.modal-content,
.modal-content label,
.modal-content h5 {
    color: #ffffff !important;
}


.modal-content .form-control,
.modal-content .form-select {
    background: rgba(255, 255, 255, 0.07);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.15);
    color: #fff !important;
    border-radius: 10px;
}


.modal-content .form-control::placeholder {
    color: rgba(255, 255, 255, 0.7) !important;
}


.btn-close {
    filter: invert(1);
}


.btn-edit-custom {
    background: #56CCF2 !important;
    color: #05061a !important;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    padding: 6px 18px;
    transition: all 0.25s ease;
    box-shadow: 0 0 10px rgba(86, 204, 242, 0.55);
}

.btn-edit-custom:hover {
    transform: scale(1.05);
    box-shadow: 0 0 18px rgba(86, 204, 242, 0.85);
}


.btn-delete-custom {
    background: #FF3484 !important;
    color: white !important;
    font-weight: 600;
    border: none;
    border-radius: 8px;
    padding: 6px 18px;
    transition: all 0.25s ease;
    box-shadow: 0 0 10px rgba(255, 52, 132, 0.55);
}

.btn-delete-custom:hover {
    transform: scale(1.05);
    box-shadow: 0 0 18px rgba(255, 52, 132, 0.85);
}




  </style>
</head>

<body>

@extends('layouts.main')

@section('title', 'Produk')

@section('content')

<style>
  body {
    background-color: #05061a;
    color: #fff;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
    padding-top: 100px;
  }
</style>

<div class="container mt-5">

    <h2 class="text-center mb-4" style="font-family:'Great Vibes',cursive;color:#58d6ff;text-shadow:0 0 12px #58d6ff;">Kelola Produk</h2>

    @if(session('success'))
        <div class="alert alert-success neon-alert text-center" id="autoAlert">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form method="GET" action="{{ route('produk.index') }}" class="mb-4">
    <div class="row g-3 align-items-center">
        <div class="col-md-4">
            <input type="text" name="search"
                   class="form-control"
                   placeholder="Cari Kode atau Nama Produk..."
                   value="{{ $search ?? '' }}">
        </div>

        <div class="col-md-2">
            <button class="btn btn-glow w-100">Search</button>
        </div>

        <div class="col-md-2">
            <button type="button"
                    class="btn btn-glow w-100"
                    data-bs-toggle="modal"
                    data-bs-target="#addModal">
                + Tambah Produk
            </button>
        </div>
    </div>
</form>

<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content text-white">

            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-header">
                    <h5 class="modal-title">Tambah Produk</h5>
                    <button class="btn-close btn-close-white"
                            data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <label class="mb-1">Kode Produk</label>
                    <input type="text" name="kode_produk"
                           class="form-control mb-3" required>

                    <label class="mb-1">Nama Produk</label>
                    <input type="text" name="nama_produk"
                           class="form-control mb-3" required>

                    <label class="mb-1">Harga</label>
                    <input type="number" name="harga"
                           class="form-control mb-3" required>

                    <label class="mb-1">Stok</label>
                    <input type="number" name="stok"
                           class="form-control mb-3" required>

                    <label class="mb-1">Kategori</label>
                    <select name="kategori_id" class="form-select mb-3" required>
                        <option value="">Pilih Kategori</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>

                    <label>Upload Gambar</label>
                    <input type="file" name="gambar"
                           class="form-control" accept="image/*">

                </div>

                <div class="modal-footer">
                    <button class="btn btn-secondary"
                            data-bs-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>


    {{-- Table Produk --}}
    <div class="table-responsive">
    <table class="table table-dark table-striped align-middle text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode</th>
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
                <td>{{ $p->kode_produk }}</td>
                <td><img src="{{ asset($p->gambar) }}" class="produk-img"></td>
                <td>{{ $p->nama_produk }}</td>
                <td>{{ $p->kategori->nama_kategori ?? '-' }}</td>
                <td>Rp{{ number_format($p->harga, 0, ',', '.') }}</td>
                <td>{{ $p->stok }}</td>

                <td>
                    <button class="btn-edit-custom btn btn-sm"
                        data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $p->id }}">
                        Edit
                    </button>

                    <form action="{{ route('produk.destroy', $p->id) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn-delete-custom btn btn-sm" onclick="return confirm('Hapus produk ini?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>


            {{-- Modal Edit --}}
            <div class="modal fade" id="editModal{{ $p->id }}" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content text-white">
                        <form action="{{ route('produk.update', $p->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf @method('PUT')

                            <div class="modal-header">
                                <h5 class="modal-title">Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>

                            <div class="modal-body">

                                @if($p->gambar)
                                <div class="mb-3 text-center">
                                    <img src="{{ asset($p->gambar) }}" style="width:80px;height:80px;border-radius:10px;object-fit:cover;">
                                </div>
                                @endif

                                <label class="mb-1">Kode Produk</label>
                                <input type="text" name="kode_produk" class="form-control mb-3" value="{{ $p->kode_produk }}" required>

                                <label class="mb-1">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control mb-3" value="{{ $p->nama_produk }}" required>

                                <label class="mb-1">Kategori</label>
                                <select name="kategori_id" class="form-select mb-3">
                                    @foreach($kategori as $k)
                                    <option value="{{ $k->id }}" {{ $p->kategori_id==$k->id?'selected':'' }}>
                                        {{ $k->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>

                                <label class="mb-1">Harga</label>
                                <input type="number" name="harga" class="form-control mb-3" value="{{ $p->harga }}" required>

                                <label class="mb-1">Stok</label>
                                <input type="number" name="stok" class="form-control mb-3" value="{{ $p->stok }}" required>

                                <label>Ganti Gambar</label>
                                <input type="file" name="gambar" class="form-control" accept="image/*">

                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button class="btn btn-primary">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>
    </div>

</div>

@if ($errors->any())
<script>
    new bootstrap.Modal(document.getElementById('addModal')).show();
</script>
@endif


<script>
setTimeout(() => {
    const alertBox = document.getElementById('autoAlert');
    if (alertBox) {
        alertBox.classList.add("fade");
        setTimeout(() => alertBox.remove(), 500);
    }
}, 3000);
</script>

@endsection


</body>
</html>
