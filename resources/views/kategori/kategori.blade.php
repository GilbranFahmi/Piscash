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
 @extends('layouts.main')
@section('title', 'Kategori')

@section('content')

<style>
/* Background and Text */
body {
    background-color: #05061a;
    color: #fff;
}

/* Search Bar Fix */
.input-search {
    background: rgba(255,255,255,0.10) !important;
    border: 1px solid rgba(255,255,255,0.15) !important;
    color: #ffffff !important; /* teks selalu putih */
    border-radius: 10px;
    text-align: center;
}

.input-search::placeholder {
    color: rgba(255,255,255,0.55) !important; /* placeholder abu soft */
}

.input-search:focus {
    border-color: #56CCF2 !important;
    box-shadow: 0 0 10px rgba(86,204,242,0.5) !important;
    outline: none !important;
}

/* Modal Glass Dark Theme */
.modal-content {
    background: rgba(5, 6, 26, 0.92) !important;
    border: 1px solid rgba(86,204,242,0.35) !important;
    backdrop-filter: blur(12px) !important;
    border-radius: 16px !important;
    color: #ffffff !important;
    box-shadow: 0 0 25px rgba(86,204,242,0.45) !important;
}

.modal-header,
.modal-footer {
    border-color: rgba(255,255,255,0.12) !important;
}

/* Modal Input */
.modal-content .form-control {
    background: rgba(255,255,255,0.12) !important;
    border: 1px solid rgba(255,255,255,0.18) !important;
    color: #ffffff !important;
    border-radius: 10px !important;
}

.modal-content .form-control:focus {
    background: rgba(0,0,0,0.35) !important;
    border: 1px solid #56CCF2 !important;
    box-shadow: 0 0 12px rgba(86,204,242,0.7) !important;
}

.modal-content .form-control::placeholder {
    color: rgba(255,255,255,0.55) !important;
}

/* Close button */
.btn-close {
    filter: invert(1) brightness(200%);
}

/* Button Glow Style */
.btn-glow {
    background: linear-gradient(90deg, #FF3484, #56CCF2);
    border: none;
    color: white;
    font-weight: 600;
    border-radius: 40px;
    padding: 10px;
    box-shadow: 0 0 12px rgba(88,214,255,0.7);
    transition: .3s;
}

.btn-glow:hover {
    transform: scale(1.05);
    box-shadow: 0 0 22px rgba(255,107,163,0.95);
}
</style>


<div class="container container-box">

    <h2 class="text-center mb-4" style="font-family:'Great Vibes', cursive; color:#58d6ff;">
        Kelola Kategori
    </h2>

    {{-- Alert --}}
    @if(session('success'))
        <div class="alert alert-success text-center" id="autoAlert">
            {{ session('success') }}
        </div>
    @endif

    {{-- Search --}}
    <form method="GET" class="mb-3">
        <input type="text" name="search"
               value="{{ $search }}"
               placeholder="Cari kategori..."
               class="form-control input-search text-center">
    </form>

    {{-- Button Tambah --}}
    <button class="btn btn-glow w-100 mb-3" data-bs-toggle="modal" data-bs-target="#addModal">
        Tambah Kategori
    </button>

    {{-- Table --}}
    <table class="table table-dark table-striped align-middle text-center">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

        @foreach ($kategori as $k)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $k->nama_kategori }}</td>
            <td>

                {{-- Edit --}}
                <button class="btn btn-info btn-sm" data-bs-toggle="modal"
                        data-bs-target="#editModal{{ $k->id }}">Edit</button>

                {{-- Hapus --}}
                <form action="{{ route('kategori.destroy', $k->id) }}" method="POST"
                      onsubmit="return confirm('Hapus kategori ini?')"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm">Hapus</button>
                </form>

            </td>
        </tr>

        {{-- MODAL EDIT --}}
        <div class="modal fade" id="editModal{{ $k->id }}" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content text-white">
                    <form action="{{ route('kategori.update', $k->id) }}" method="POST">
                        @csrf @method('PUT')
                        <div class="modal-header">
                            <h5 class="modal-title">Edit Kategori</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" name="nama_kategori"
                                   class="form-control"
                                   value="{{ $k->nama_kategori }}" required>
                        </div>
                        <div class="modal-footer">
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

{{-- MODAL TAMBAH --}}
<div class="modal fade" id="addModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content text-white">
            <form action="{{ route('kategori.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Kategori</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <input type="text" name="nama_kategori" class="form-control"
                           placeholder="Nama Kategori" required>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
