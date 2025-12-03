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

    select, input {
      background: #081027;
      color: #b3e9ff;
      border: 1px solid #58d6ff66;
      border-radius: 10px;
      padding: 10px;
      margin-bottom: 12px;
    }

    .btn-glow {
      background: linear-gradient(90deg, #FF3484, #56CCF2);
      border: none;
      border-radius: 25px;
      color: white;
      font-weight: 600;
      padding: 10px 20px;
      width: 100%;
      box-shadow: 0 0 15px rgba(88,214,255,0.6);
    }

    .kodeProdukInput.loading {
      opacity: 0.6;
    }

    .cash-chip {
      border-radius: 12px;
      padding: 8px 16px;
      border: 1px solid #56CCF2;
      background: rgba(8,16,40,0.9);
      color: #b3e9ff;
      font-weight: 600;
      box-shadow: 0 0 10px rgba(86,204,242,0.4);
      transition: 0.2s;
    }
    .cash-chip:hover {
      transform: translateY(-1px) scale(1.03);
      box-shadow: 0 0 16px rgba(86,204,242,0.8);
    }
  </style>
</head>
<body>

@extends('layouts.main')
@section('content')

<style>
  body {
    background-color: #05061a;
    color: #fff;
    font-family: 'Poppins', sans-serif;
  }

  .transaksi-wrapper {
    width: 100%;
    max-width: 1100px;
    margin: 0 auto 40px auto;
    display: grid;
    grid-template-columns: 1.4fr 1fr;
    gap: 20px;
  }

  .container-transaksi {
    width: 100%;
    background: rgba(10,15,40,0.8);
    padding: 20px 22px;
    border-radius: 20px;
    box-shadow: 0 0 25px rgba(88,214,255,0.3);
  }

  label { margin-top: 6px; font-size: 14px; }

  .produk-item {
    display: grid;
    grid-template-columns: repeat(4,1fr);
    gap: 6px;
    background: rgba(12,18,45,0.8);
    padding: 10px;
    border-radius: 12px;
    border: 1px solid #58d6ff66;
    margin-bottom: 10px;
    position: relative;
  }

  .cash-chip {
    border-radius: 8px;
    padding: 5px 12px;
    border: 1px solid #56CCF2;
    background: transparent;
    font-size: 13px;
    color: #b3e9ff;
    cursor: pointer;
  }

  .cash-chip:hover {
    transform: scale(1.05);
    background: #56CCF233;
  }

  .close-produk-btn {
    position: absolute;
    right: 5px; top: 5px;
    width: 24px; height: 24px;
    border-radius: 50%;
    font-size: 14px;
    font-weight: 700;
    background: #ff3566;
    border: none;
    cursor: pointer;
    color:#fff;
    display:flex;
    align-items:center;
    justify-content:center;
  }

  .preview-panel {
    background: rgba(10,15,40,0.9);
    border-radius: 20px;
    border: 1px solid #56CCF2;
    box-shadow: 0 0 20px rgba(88,214,255,0.4);
    padding: 16px;
    min-height: 320px;
    display: flex;
    flex-direction: column;
    align-items: center;
  }

  .preview-title {
    font-size: 14px;
    margin-bottom: 10px;
    color: #b3e9ff;
    text-transform: uppercase;
    letter-spacing: .08em;
  }

  .preview-image-wrapper {
    position: relative;
    width: 100%;
    max-width: 260px;
    margin-bottom: 10px;
    cursor: pointer;
  }

  .preview-img {
    width: 100%;
    height: 210px;
    border-radius: 14px;
    object-fit: cover;
    transition: 0.2s;
    box-shadow: 0 0 12px rgba(88,214,255,0.4);
  }

  .preview-img:hover {
    transform: scale(1.02);
  }

  .preview-badge-stok {
    position: absolute;
    bottom: 10px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(255,61,104,0.93);
    padding: 4px 10px;
    border-radius: 999px;
    font-size: 11px;
    font-weight: 700;
  }

  .preview-nama {
    font-weight: 600;
    font-size: 16px;
    margin-top: 4px;
    text-align: center;
  }

  .preview-harga {
    font-weight: 700;
    font-size: 18px;
    color: #56CCF2;
    text-align: center;
  }

  .preview-stok {
    font-size: 13px;
    margin-top: 4px;
    text-align: center;
  }

  .stok-menipis {
    color: #ff5a5a;
    font-weight: 600;
  }

  .stok-habis-img {
    filter: grayscale(1);
  }

  .success-glow {
    box-shadow: 0 0 18px rgba(0,255,170,0.8) !important;
    animation: successGlowAnim 0.5s ease-out;
  }

  @keyframes successGlowAnim {
    from { box-shadow: 0 0 0 rgba(0,255,170,0); }
    to { box-shadow: 0 0 18px rgba(0,255,170,0.8); }
  }

  .scan-error {
    background-color: #ff3566 !important;
    animation: shake 0.2s linear 2;
  }

  .scan-success {
    box-shadow: 0 0 12px #00ff80 !important;
    border-color: #00ff80 !important;
    transition: 0.2s;
  }

  @keyframes shake {
    0% { transform: translateX(0) }
    25% { transform: translateX(-3px) }
    75% { transform: translateX(3px) }
    100% { transform: translateX(0) }
  }
</style>

<div class="transaksi-wrapper">

  <div>
    <div class="container-transaksi">

      <h4 class="text-center mb-3" style="color:#58d6ff;">Transaksi Kasir</h4>

      @if(session('error'))
      <div class="alert alert-danger p-2">{{ session('error') }}</div>
      @endif

      <form action="{{ route('transaksi.store') }}" method="POST" id="formTransaksi">
        @csrf

        <div id="produkList">
          <div class="produk-item">

            <div>
              <input type="text" class="form-control kodeProdukInput"
                     placeholder="Scan Kode"
                     oninput="scanKode(this)" autocomplete="off">
              <small class="text-danger errorScan" style="display:none;font-size:12px;">
                Kode produk tidak ditemukan!
              </small>
            </div>

            <select class="form-select kategoriSelect" onchange="filterProduk(this)">
              <option value="">Kategori</option>
              @foreach($kategori as $k)
              <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
              @endforeach
            </select>

            <select name="produk_id[]" class="form-select produkSelect" onchange="updateHarga(this)" required>
              <option value="">Produk</option>
              @foreach($produks as $p)
              <option value="{{ $p->id }}" data-kategori="{{ $p->kategori_id }}" data-harga="{{ $p->harga }}">{{ $p->kode_produk }} | {{ $p->nama_produk }}</option>
              @endforeach
            </select>

            <input type="number" name="jumlah[]" class="form-control jumlahInput" min="1" value="1"
                   oninput="updateTotal()">

            <input type="text" class="form-control hargaInput" placeholder="Harga" readonly>

            <input type="hidden" name="subtotal[]" class="subtotalInput">
          </div>
        </div>

        <button type="button" class="cash-chip mb-2" onclick="tambahProduk()">+ Produk</button>

        <hr style="border-color:#333">

        <div class="d-flex justify-content-between">
          <strong>Total:</strong>
          <strong>Rp <span id="totalTampil">0</span></strong>
        </div>
        <input type="hidden" name="total" id="totalInput">

        <label class="mt-2">Split Bill?</label>
        <select id="splitBillSelect" name="splitBill" class="form-select" onchange="toggleSplitBill()">
          <option value="false">Tidak</option>
          <option value="true">Ya</option>
        </select>

        <div id="singlePay">
          <select name="metode" id="metodePembayaran" class="form-select mt-2" onchange="toggleCash()">
            <option value="Tunai">Tunai</option>
            <option value="QRIS">QRIS</option>
            <option value="MasterCard">MasterCard</option>
            <option value="Debit">Debit</option>
            <option value="Kredit">Kredit</option>
          </select>

          <div id="cashOptions" class="d-flex gap-1 mt-1 flex-wrap">
            <button type="button" class="cash-chip pecahan" data-value="10000">10k</button>
            <button type="button" class="cash-chip pecahan" data-value="20000">20k</button>
            <button type="button" class="cash-chip pecahan" data-value="50000">50k</button>
            <button type="button" class="cash-chip pecahan" data-value="100000">100k</button>
          </div>

          <input type="number" name="jumlah_bayar" id="jumlahBayar" class="form-control mt-1" placeholder="Masukkan Bayar" oninput="hitungKembalian()">
        </div>

        <div id="splitPay" style="display:none;">
          <small>Pembayaran 1</small>
          <select name="metode1" class="form-select">
            <option value="Tunai">Tunai</option>
            <option value="QRIS">QRIS</option>
            <option value="MasterCard">MasterCard</option>
            <option value="Debit">Debit</option>
            <option value="Kredit">Kredit</option>
          </select>
          <input type="number" name="nominal1" class="form-control mb-2" oninput="updateSplitTotal()" placeholder="Nominal 1">

          <small>Pembayaran 2</small>
          <select name="metode2" class="form-select">
            <option value="Tunai">Tunai</option>
            <option value="QRIS">QRIS</option>
            <option value="MasterCard">MasterCard</option>
            <option value="Debit">Debit</option>
            <option value="Kredit">Kredit</option>
          </select>
          <input type="number" name="nominal2" class="form-control" oninput="updateSplitTotal()" placeholder="Nominal 2">

          <input type="hidden" id="jumlahBayarSplit">
        </div>

        <label class="mt-2">Kembalian</label>
        <input type="text" id="kembalian" name="kembalian" class="form-control" readonly>

        <button type="submit" class="btn-glow mt-3">Simpan</button>

      </form>
    </div>
  </div>

  <div>
    <div class="preview-panel" id="previewPanel">
      <div class="preview-title">Preview Produk</div>
      <div class="preview-image-wrapper" id="previewImageWrapper">
        <img id="previewImg" src="{{ asset('images/logo5.png') }}" alt="Preview Produk" class="preview-img">
        <span id="previewBadge" class="preview-badge-stok" style="display:none;">STOK HABIS</span>
      </div>
      <div class="preview-nama" id="previewNama">Belum ada produk dipilih</div>
      <div class="preview-harga" id="previewHarga">Rp -</div>
      <div class="preview-stok" id="previewStok">Stok: -</div>
    </div>
  </div>

</div>

<div class="modal fade" id="previewModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content" style="background:#05061a;border:1px solid #56CCF2;">
      <img id="previewModalImg" src="" alt="Preview" style="width:100%;border-radius:10px;">
    </div>
  </div>
</div>

<script>
const produkData = @json($produks);
let successSound = new Audio('/audio/success.wav');
let errorSound = new Audio('/audio/error.wav');

function getProdukById(id){
  id = parseInt(id);
  return produkData.find(p => parseInt(p.id) === id);
}

function setPreview(produk){
  const panel = document.getElementById('previewPanel');
  const img = document.getElementById('previewImg');
  const badge = document.getElementById('previewBadge');
  const nama = document.getElementById('previewNama');
  const harga = document.getElementById('previewHarga');
  const stokEl = document.getElementById('previewStok');

  if(!produk){
    img.src = "{{ asset('images/logo5.png') }}";
    img.classList.remove('stok-habis-img');
    badge.style.display = 'none';
    nama.textContent = 'Belum ada produk dipilih';
    harga.textContent = 'Rp -';
    stokEl.textContent = 'Stok: -';
    stokEl.classList.remove('stok-menipis');
    return;
  }

  img.src = produk.gambar ? '/' + produk.gambar : "{{ asset('images/logo5.png') }}";
  nama.textContent = produk.nama_produk;
  harga.textContent = 'Rp ' + Number(produk.harga).toLocaleString('id-ID');
  stokEl.textContent = 'Stok: ' + produk.stok;

  img.classList.remove('stok-habis-img');
  badge.style.display = 'none';
  stokEl.classList.remove('stok-menipis');

  if (produk.stok <= 0){
    img.classList.add('stok-habis-img');
    badge.style.display = 'inline-block';
  } else if (produk.stok <= 5){
    stokEl.classList.add('stok-menipis');
  }

  panel.classList.add('success-glow');
  setTimeout(()=>panel.classList.remove('success-glow'), 600);
}

function filterProduk(el){
  const kategoriId = el.value;
  const item = el.closest('.produk-item');
  const produkSelect = item.querySelector('.produkSelect');
  produkSelect.querySelectorAll('option').forEach(opt=>{
    if(!opt.value) return;
    opt.style.display = opt.dataset.kategori == kategoriId ? 'block':'none';
  });
}

function updateHarga(el){
  const item = el.closest('.produk-item');
  const selected = el.selectedOptions[0];
  if(!selected){
    item.querySelector('.hargaInput').value = '';
    updateTotal();
    setPreview(null);
    return;
  }
  item.querySelector('.hargaInput').value = selected.dataset.harga;
  updateTotal();

  const id = el.value;
  const produk = getProdukById(id);
  if(produk){
    setPreview(produk);
    try { successSound.currentTime = 0; successSound.play(); } catch(e){}
  }
}

function updateTotal(){
  let total = 0;
  document.querySelectorAll('.produk-item').forEach(i=>{
    const harga = parseInt(i.querySelector('.hargaInput').value) || 0;
    const jumlah = parseInt(i.querySelector('.jumlahInput').value) || 1;
    const sub = harga * jumlah;
    i.querySelector('.subtotalInput').value = sub;
    total += sub;
  });
  document.getElementById('totalInput').value = total;
  document.getElementById('totalTampil').textContent = total.toLocaleString('id-ID');
  hitungKembalian();
}

function toggleSplitBill(){
  const val = document.getElementById('splitBillSelect').value;
  document.getElementById('singlePay').style.display = val === "true" ? "none":"block";
  document.getElementById('splitPay').style.display   = val === "true" ? "block":"none";
  hitungKembalian();
}

function toggleCash(){
  document.getElementById('cashOptions').style.display =
    document.getElementById('metodePembayaran').value === "Tunai" ? "flex":"none";
}

document.querySelectorAll('.pecahan').forEach(btn=>{
  btn.onclick = ()=>{
    const bayar = document.getElementById('jumlahBayar');
    bayar.value = (parseInt(bayar.value)||0) + parseInt(btn.dataset.value);
    hitungKembalian();
  }
});

function updateSplitTotal() {
  const n1 = parseInt(document.getElementsByName('nominal1')[0].value) || 0;
  const n2 = parseInt(document.getElementsByName('nominal2')[0].value) || 0;
  document.getElementById('jumlahBayarSplit').value = n1 + n2;
  hitungKembalian();
}

function hitungKembalian(){
  const total = parseInt(document.getElementById('totalInput').value)||0;
  const split = document.getElementById('splitBillSelect').value==="true";
  const bayar = split
    ? (parseInt(document.getElementById('jumlahBayarSplit').value)||0)
    : (parseInt(document.getElementById('jumlahBayar').value)||0);
  document.getElementById('kembalian').value = bayar > total ? bayar-total:0;
}

let scanTimer = null;

function scanKode(input){
  const kode = input.value.trim();

  if(kode.length < 4) return;

  if(scanTimer) clearTimeout(scanTimer);

  scanTimer = setTimeout(() => {
    fetch(`/transaksi/search-kode?kode=${encodeURIComponent(kode)}`)
      .then(r => r.json())
      .then(data => {
        const item = input.closest('.produk-item');
        const errorText = item.querySelector('.errorScan');

        if(data.error){
          if (errorText) {
            errorText.style.display = 'block';
            errorText.textContent = 'Kode produk tidak ditemukan!';
          }
          item.classList.add('scan-error');
          setTimeout(() => item.classList.remove('scan-error'), 300);
          try {
            errorSound.currentTime = 0;
            errorSound.play();
          } catch(e){}
          return;
        }

        if (errorText) errorText.style.display = 'none';

        const kategoriSelect = item.querySelector('.kategoriSelect');
        const produkSelect = item.querySelector('.produkSelect');
        const hargaInput = item.querySelector('.hargaInput');

        kategoriSelect.value = data.kategori_id;
        filterProduk(kategoriSelect);
        produkSelect.value = data.id;
        hargaInput.value = data.harga;

        updateTotal();
        setPreview(data);

        item.classList.add('scan-success');
        setTimeout(() => item.classList.remove('scan-success'), 600);

        input.value = '';
        input.focus();

        try {
          successSound.currentTime = 0;
          successSound.play();
        } catch(_) {}

      })
      .catch(() => {});
  }, 300);
}

function tambahProduk(){
  const list = document.getElementById('produkList');
  const clone = list.firstElementChild.cloneNode(true);
  clone.querySelectorAll('input').forEach(i=>{
    if(i.classList.contains('jumlahInput')) i.value = 1;
    else i.value = '';
  });
  clone.querySelectorAll('select').forEach(s=>s.selectedIndex = 0);
  clone.querySelector('.close-produk-btn')?.remove();
  const close = document.createElement('button');
  close.type='button';
  close.className='close-produk-btn';
  close.innerHTML='×';
  close.onclick=()=>{ clone.remove(); updateTotal(); };
  clone.appendChild(close);
  list.appendChild(clone);
  const scanInput = clone.querySelector('.kodeProdukInput');
  if(scanInput) scanInput.focus();
}

document.addEventListener('DOMContentLoaded', function(){
  const firstScan = document.querySelector('.kodeProdukInput');
  if(firstScan) firstScan.focus();

  const wrapper = document.getElementById('previewImageWrapper');
  wrapper.addEventListener('click', ()=>{
    const src = document.getElementById('previewImg').getAttribute('src');
    document.getElementById('previewModalImg').src = src;
    const modal = new bootstrap.Modal(document.getElementById('previewModal'));
    modal.show();
  });

  const form = document.getElementById('formTransaksi');
  form.addEventListener('submit', function(){
    const split = document.getElementById('splitBillSelect').value === "true";
    if (split) {
      const totalSplit = parseInt(document.getElementById('jumlahBayarSplit').value) || 0;
      document.getElementById('jumlahBayar').value = totalSplit;
    }
  });
});
</script>

@endsection
</body>
</html>
