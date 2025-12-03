<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h3 class="text-center">Detail Drawer Tanggal {{ $tanggal }}</h3>

    <p><strong>Kasir:</strong> {{ $drawer->kasir->nama }}</p>
    <p><strong>Saldo Awal:</strong> Rp{{ number_format($drawer->saldo_awal,0,',','.') }}</p>
    <p><strong>Saldo Akhir:</strong> Rp{{ number_format($drawer->saldo_akhir,0,',','.') }}</p>

    <h5 class="mt-4">Transaksi</h5>
    <table class="table table-bordered table-dark">
        <thead>
        <tr>
            <th>ID</th>
            <th>Total</th>
            <th>Jam</th>
        </tr>
        </thead>
        <tbody>
        @foreach($transaksi as $t)
            <tr>
                <td>{{ $t->kode_qr }}</td>
                <td>Rp{{ number_format($t->total_harga,0,',','.') }}</td>
                <td>{{ $t->created_at->format('H:i') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h5 class="mt-4">Ringkasan Metode Pembayaran</h5>
    <table class="table table-bordered table-dark">
        <thead>
        <tr>
            <th>Metode</th>
            <th>Jumlah Transaksi</th>
            <th>Total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($paymentSummary as $metode => $data)
            <tr>
                <td>{{ $metode }}</td>
                <td>{{ $data['count'] }}</td>
                <td>Rp{{ number_format($data['total'],0,',','.') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
<a href="{{ route('drawer.export', $drawer->id) }}"
   class="btn btn-success mb-3">
   Export Excel
</a>

</div>
@endsection
</body>
</html>