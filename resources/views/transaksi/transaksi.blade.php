<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Transaksi - Pisces Accessories</title>

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
      transition: 0.3s ease;
      text-shadow: 0 0 6px #56CCF2;
    }

    .nav-link.active {
      color: #FF3484 !important;
      text-shadow: 0 0 8px #FF3484;
    }

    .container-transaksi {
      max-width: 750px;
      margin: 50px auto;
      background: rgba(10,15,40,0.8);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(88,214,255,0.3);
    }

    h2 {
      text-align: center;
      font-family: 'Great Vibes', cursive;
      color: #58d6ff;
      text-shadow: 0 0 12px #58d6ff;
      margin-bottom: 25px;
    }

    select, input {
      background: #081027;
      color: #b3e9ff;
      border: 1px solid #58d6ff66;
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 15px;
    }

    .btn-glow {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      border-radius: 25px;
      color: white;
      font-weight: 600;
      padding: 10px 20px;
      margin-top: 15px;  
      transition: 0.3s;
      width: 100%;
      box-shadow: 0 0 15px rgba(88,214,255,0.6);
    }

    .btn-glow:hover {
      transform: scale(1.05);
    }

    .produk-item {
      border: 1px solid #58d6ff55;
      border-radius: 15px;
      padding: 15px;
      margin-bottom: 15px;
      background: rgba(5,10,25,0.5);
    }

    .split-container {
      display: none;
      margin-top: 15px;
      padding: 10px;
      border: 1px dashed #58d6ff88;
      border-radius: 10px;
    }

.close-produk-btn {
  position: absolute;
  right: 10px;
  top: 8px;
  width: 30px;
  height: 30px;
  border-radius: 50%;
  background: linear-gradient(90deg,#ff5a8b,#56ccf2);
  border: none;
  color: #fff;
  font-weight: 700;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
}
.close-produk-btn:hover { transform: scale(1.05); }
  </style>
</head>

<body>

@extends('layouts.main')
@section('content')

<div class="container-transaksi">
    <h2>🛍️ Transaksi</h2>

    @if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif


    <form action="{{ route('transaksi.store') }}" method="POST">
      @csrf


      <div id="produkList">
        <div class="produk-item position-relative">

          <label>Kategori Produk</label>
          <select class="form-select kategori" onchange="filterProduk(this)" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach($kategori as $k)
            <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
            @endforeach
          </select>

          <label>Nama Produk</label>
          <select name="produk_id[]" class="form-select produk" onchange="updateHarga(this)" required>
            <option value="">-- Pilih Produk --</option>
            @foreach($produks as $p)
            <option value="{{ $p->id }}" data-kategori="{{ $p->kategori_id }}" data-harga="{{ $p->harga }}">
              {{ $p->nama_produk }}
            </option>
            @endforeach
          </select>

          <label>Harga</label>
          <input type="text" class="form-control harga" readonly>

          <label>Jumlah</label>
          <input type="number" name="jumlah[]" class="form-control jumlah" value="1" min="1" oninput="updateTotal()">

          <input type="hidden" name="subtotal[]" class="subtotal">
        </div>
      </div>

      <button type="button" class="btn-glow mt-2" onclick="tambahProduk()">+ Tambah Produk</button>

      <hr>

      <h5 class="text-end">Total: Rp<span id="totalTampil">0</span></h5>
      <input type="hidden" name="total" id="totalInput">

    
      <div class="mt-3">
        <label>
          <input type="checkbox" id="splitBillCheck" name="splitBill" value="on" onchange="toggleSplit()">
          Split Bill
        </label>

        <div id="splitContainer" class="split-container">
          <div class="mb-2">
            <label>Metode 1</label>
            <select name="metode1" class="form-select">
              <option value="Tunai">Tunai</option>
              <option value="E-Wallet">E-Wallet</option>
              <option value="Transfer Bank">Transfer Bank</option>
            </select>
            <input type="number" name="nominal1" class="form-control mt-1 nominal1" placeholder="Nominal 1">
          </div>

          <div>
            <label>Metode 2</label>
            <select name="metode2" class="form-select">
              <option value="Tunai">Tunai</option>
              <option value="E-Wallet">E-Wallet</option>
              <option value="Transfer Bank">Transfer Bank</option>
            </select>
            <input type="number" name="nominal2" class="form-control mt-1 nominal2" placeholder="Nominal 2">
          </div>
        </div>
      </div>

    
      <div id="metodeSingleContainer" class="mt-3">
        <label>Metode Pembayaran</label>
        <select name="metode" class="form-select mb-3">
          <option value="Tunai">Tunai</option>
          <option value="E-Wallet">E-Wallet</option>
          <option value="Transfer Bank">Transfer Bank</option>
        </select>
      </div>

      <label>Jumlah Bayar</label>
      <input type="number" name="jumlah_bayar" id="jumlahBayar" class="form-control" oninput="hitungKembalian()" required>

      <label class="mt-2">Kembalian</label>
      <input type="text" name="kembalian" id="kembalian" class="form-control" readonly>

      <button type="submit" class="btn-glow mt-4">Selesaikan Transaksi</button>

    </form>
</div>


<script>
function filterProduk(select) {
    const kategoriId = select.value;
    const produkSelect = select.parentElement.querySelector('.produk');

    produkSelect.querySelectorAll('option').forEach(opt => {
        if (!opt.value) return;
        opt.style.display = opt.dataset.kategori === kategoriId ? 'block' : 'none';
    });
}


function updateHarga(select) {
    const harga = select.selectedOptions[0]?.dataset.harga || 0;
    select.parentElement.querySelector('.harga').value = harga;
    updateTotal();
}


function updateTotal() {
    let total = 0;
    document.querySelectorAll('.produk-item').forEach(item => {
        const harga = parseFloat(item.querySelector('.harga').value) || 0;
        const jumlah = parseInt(item.querySelector('.jumlah').value) || 1;
        const subtotal = harga * jumlah;

        item.querySelector('.subtotal').value = subtotal;
        total += subtotal;
    });

    document.getElementById('totalInput').value = total;
    document.getElementById('totalTampil').textContent = total.toLocaleString('id-ID');
}


function hitungKembalian() {
    const total = parseFloat(document.getElementById('totalInput').value) || 0;
    const bayar = parseFloat(document.getElementById('jumlahBayar').value) || 0;
    const kembalian = bayar - total;

    document.getElementById('kembalian').value = kembalian > 0 ? kembalian : 0;
}


function createCloseButton() {
    const btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'close-produk-btn';
    btn.innerHTML = '&times;';
    btn.addEventListener('click', () => hapusProduk(btn));
    return btn;
}

function hapusProduk(button) {
    const container = document.getElementById('produkList');
    if (container.children.length <= 1) {
        alert('Minimal 1 produk harus ada.');
        return;
    }

    button.closest('.produk-item').remove();
    updateTotal();
}


function tambahProduk() {
    const produkList = document.getElementById('produkList');
    const clone = produkList.firstElementChild.cloneNode(true);

    clone.querySelectorAll('input').forEach(i => i.value = i.type === 'number' ? 1 : '');
    clone.querySelectorAll('select').forEach(s => s.selectedIndex = 0);

    if (!clone.querySelector('.close-produk-btn')) {
        clone.appendChild(createCloseButton());
    }

    produkList.appendChild(clone);
    updateTotal();
}

function toggleSplit() {
    const splitOn = document.getElementById('splitBillCheck').checked;
    document.getElementById('splitContainer').style.display = splitOn ? 'block' : 'none';
    document.getElementById('metodeSingleContainer').style.display = splitOn ? 'none' : 'block';
}

document.addEventListener('DOMContentLoaded', () => {
    toggleSplit();
    updateTotal();

    const form = document.querySelector('form');
    form.addEventListener('submit', function() {

        if (document.getElementById('splitBillCheck').checked) {
            const n1 = parseFloat(document.querySelector('.nominal1').value) || 0;
            const n2 = parseFloat(document.querySelector('.nominal2').value) || 0;
            const sum = n1 + n2;

            document.getElementById('jumlahBayar').value = sum;

            const total = parseFloat(document.getElementById('totalInput').value) || 0;
            document.getElementById('kembalian').value = sum - total;
        }
    });
});
</script>

@endsection
</body>
</html>
