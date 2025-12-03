{{-- resources/views/transaksi/transaksi.blade.php --}}
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
      font-family: 'Poppins', 'Great Vibes', sans-serif;
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

{{-- resources/views/transaksi/transaksi.blade.php --}}
@extends('layouts.main')

@section('title', 'Transaksi')

@section('content')

<style>
  body {
    background-color: #05061a;
    color: #fff;
    font-family: 'Poppins', 'Great Vibes', sans-serif;
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

  /* ---- layout transaksi ---- */
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
    padding: 14px;
    min-height: 260px;
    display: flex;
    flex-direction: column;
  }

  .preview-title {
    font-size: 13px;
    margin-bottom: 8px;
    color: #b3e9ff;
    text-transform: uppercase;
    letter-spacing: .08em;
    text-align: center;
  }

  .preview-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 8px;
    margin-top: 4px;
  }

  .preview-card {
    background: rgba(6,10,30,0.95);
    border-radius: 12px;
    padding: 6px;
    border: 1px solid rgba(88,214,255,0.2);
    cursor: pointer;
    transition: 0.15s;
    text-align: center;
  }

  .preview-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 0 10px rgba(88,214,255,0.6);
  }

  .preview-card.active {
    border-color: #56CCF2;
    box-shadow: 0 0 14px rgba(88,214,255,0.8);
  }

  .preview-card-img {
    width: 100%;
    height: 70px;
    border-radius: 8px;
    object-fit: cover;
  }

  .preview-card-img.stok-habis-img {
    filter: grayscale(1);
  }

  .preview-card-nama {
    font-size: 11px;
    margin-top: 4px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .preview-card-harga {
    font-size: 11px;
    font-weight: 600;
    color: #56CCF2;
  }

  .preview-card-stok {
    font-size: 10px;
  }

  .stok-menipis {
    color: #ff5a5a;
    font-weight: 600;
  }

  .preview-badge-stok {
    position: absolute;
    bottom: 4px;
    left: 50%;
    transform: translateX(-50%);
    background: rgba(255,61,104,0.93);
    padding: 1px 6px;
    border-radius: 999px;
    font-size: 9px;
    font-weight: 700;
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
    background-color: #ff356633 !important;
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

  .neon-title {
    font-family: 'Great Vibes', cursive;
    font-size: 36px;
    font-weight: 400;
    color: #58d6ff;
    text-shadow:
      0 0 10px rgba(88,214,255,0.9),
      0 0 20px rgba(88,214,255,0.7),
      0 0 30px rgba(88,214,255,0.5);
  }
</style>

<div class="transaksi-wrapper">

  {{-- KIRI: FORM TRANSAKSI --}}
  <div>
    <div class="container-transaksi">

      <h4 class="neon-title mb-3 text-center">Transaksi</h4>

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
              <option value="">Nama Produk</option>
              @foreach($produks as $p)
                <option value="{{ $p->id }}"
                        data-kategori="{{ $p->kategori_id }}"
                        data-harga="{{ $p->harga }}"
                        data-kode="{{ $p->kode_produk }}">
                  {{ $p->nama_produk }}
                </option>
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

          <input type="number" name="jumlah_bayar" id="jumlahBayar" class="form-control mt-1"
                 placeholder="Masukkan Bayar" oninput="hitungKembalian()">
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
          <input type="number" name="nominal1" class="form-control mb-2"
                 oninput="updateSplitTotal()" placeholder="Nominal 1">

          <small>Pembayaran 2</small>
          <select name="metode2" class="form-select">
            <option value="Tunai">Tunai</option>
            <option value="QRIS">QRIS</option>
            <option value="MasterCard">MasterCard</option>
            <option value="Debit">Debit</option>
            <option value="Kredit">Kredit</option>
          </select>
          <input type="number" name="nominal2" class="form-control"
                 oninput="updateSplitTotal()" placeholder="Nominal 2">

          <input type="hidden" id="jumlahBayarSplit">
        </div>

        <label class="mt-2">Kembalian</label>
        <input type="text" id="kembalian" name="kembalian" class="form-control" readonly>

        <button type="submit" class="btn-glow mt-3">Simpan</button>

      </form>
    </div>
  </div>

  {{-- KANAN: PREVIEW PRODUK / “KERANJANG” VISUAL --}}
  <div>
    <div class="preview-panel" id="previewPanel">
      <div class="preview-title">Preview Produk</div>
      <div class="preview-grid" id="previewGrid">
        {{-- kartu preview diisi via JS --}}
      </div>
    </div>
  </div>

</div>

{{-- MODAL PREVIEW GAMBAR --}}
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

let selectedPreviewRow = null;

function getProdukById(id){
  id = parseInt(id);
  return produkData.find(p => parseInt(p.id) === id);
}

function buildPreviewCards() {
  const grid = document.getElementById('previewGrid');
  grid.innerHTML = '';

  const items = document.querySelectorAll('.produk-item');
  let any = false;

  items.forEach((item, index) => {
    const select = item.querySelector('.produkSelect');
    if (!select || !select.value) return;

    const produk = getProdukById(select.value);
    if (!produk) return;
    any = true;

    const card = document.createElement('div');
    card.className = 'preview-card';
    if (item === selectedPreviewRow) {
      card.classList.add('active');
    }

    const wrapper = document.createElement('div');
    wrapper.style.position = 'relative';

    const img = document.createElement('img');
    img.className = 'preview-card-img';
    img.src = produk.gambar ? '/' + produk.gambar : "{{ asset('images/logo5.png') }}";

    const stokBadge = document.createElement('span');
    stokBadge.className = 'preview-badge-stok';
    stokBadge.textContent = 'STOK HABIS';
    stokBadge.style.display = 'none';

    wrapper.appendChild(img);
    wrapper.appendChild(stokBadge);
    card.appendChild(wrapper);

    if (produk.stok <= 0) {
      img.classList.add('stok-habis-img');
      stokBadge.style.display = 'inline-block';
    }

    const nama = document.createElement('div');
    nama.className = 'preview-card-nama';
    nama.textContent = produk.nama_produk;
    card.appendChild(nama);

    const harga = document.createElement('div');
    harga.className = 'preview-card-harga';
    harga.textContent = 'Rp ' + Number(produk.harga).toLocaleString('id-ID');
    card.appendChild(harga);

    const stok = document.createElement('div');
    stok.className = 'preview-card-stok';
    stok.textContent = 'Stok: ' + produk.stok;
    if (produk.stok > 0 && produk.stok <= 5) {
      stok.classList.add('stok-menipis');
    }
    card.appendChild(stok);

    card.addEventListener('click', () => {
      selectedPreviewRow = item;
      buildPreviewCards();
      const src = img.getAttribute('src');
      document.getElementById('previewModalImg').src = src;
      const modal = new bootstrap.Modal(document.getElementById('previewModal'));
      modal.show();
    });

    grid.appendChild(card);
  });

  if (!any) {
    const empty = document.createElement('div');
    empty.style.textAlign = 'center';
    empty.style.fontSize = '13px';
    empty.style.color = '#b3e9ff';
    empty.textContent = 'Belum ada produk dipilih';
    grid.appendChild(empty);
  }
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
  const hargaInput = item.querySelector('.hargaInput');
  const kodeInput = item.querySelector('.kodeProdukInput');

  if(!selected){
    if (hargaInput) hargaInput.value = '';
    updateTotal();
    selectedPreviewRow = null;
    buildPreviewCards();
    return;
  }

  hargaInput.value = selected.dataset.harga || 0;

  const produk = getProdukById(el.value);
  if (produk && kodeInput) {
    kodeInput.value = produk.kode_produk || '';
  }

  selectedPreviewRow = item;
  updateTotal();
  buildPreviewCards();

  if(produk){
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
  const totalBayar = n1 + n2;
  document.getElementById('jumlahBayarSplit').value = totalBayar;

  const bayarInput = document.getElementById('jumlahBayar');
  if (bayarInput) bayarInput.value = totalBayar;

  hitungKembalian();
}

function hitungKembalian(){
  const total = parseInt(document.getElementById('totalInput').value)||0;
  const bayar = parseInt(document.getElementById('jumlahBayar').value)||0;
  document.getElementById('kembalian').value = bayar > total ? (bayar-total) : 0;
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

        input.value = data.kode_produk || '';
        input.focus();
        input.select();

        selectedPreviewRow = item;
        updateTotal();
        buildPreviewCards();

        item.classList.add('scan-success');
        setTimeout(() => item.classList.remove('scan-success'), 600);

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
  const err = clone.querySelector('.errorScan');
  if (err) err.style.display = 'none';

  clone.querySelector('.close-produk-btn')?.remove();
  const close = document.createElement('button');
  close.type='button';
  close.className='close-produk-btn';
  close.innerHTML='×';
  close.onclick=()=>{ 
    const wasSelected = (clone === selectedPreviewRow);
    clone.remove(); 
    updateTotal(); 
    if (wasSelected) {
      const firstSelect = document.querySelector('.produkSelect');
      if (firstSelect && firstSelect.value) {
        selectedPreviewRow = firstSelect.closest('.produk-item');
      } else {
        selectedPreviewRow = null;
      }
      buildPreviewCards();
    }
  };
  clone.appendChild(close);
  list.appendChild(clone);

  const scanInput = clone.querySelector('.kodeProdukInput');
  if(scanInput) scanInput.focus();
}

document.addEventListener('DOMContentLoaded', function(){
  const firstScan = document.querySelector('.kodeProdukInput');
  if(firstScan) firstScan.focus();

  buildPreviewCards();

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
