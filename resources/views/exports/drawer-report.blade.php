<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <table border="1">
    <tr>
        <th colspan="5">Laporan Drawer</th>
    </tr>

    <tr>
        <td><strong>Kasir</strong></td>
        <td colspan="4">{{ $drawer->kasir->nama }}</td>
    </tr>
    <tr>
        <td><strong>Tanggal</strong></td>
        <td colspan="4">{{ $tanggal }}</td>
    </tr>
    <tr>
        <td><strong>Saldo Awal</strong></td>
        <td colspan="4">Rp {{ number_format($drawer->saldo_awal,0,',','.') }}</td>
    </tr>
    <tr>
        <td><strong>Saldo Akhir</strong></td>
        <td colspan="4">Rp {{ number_format($drawer->saldo_akhir,0,',','.') }}</td>
    </tr>

    <tr><td colspan="5"></td></tr>

    <tr>
        <th>No</th>
        <th>ID Transaksi</th>
        <th>Waktu</th>
        <th>Total</th>
        <th>Metode</th>
    </tr>

    @foreach($transaksi as $t)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $t->kode_qr }}</td>
        <td>{{ $t->created_at }}</td>
        <td>{{ number_format($t->total_harga,0,',','.') }}</td>
        <td>{{ $t->metode }}</td>
    </tr>
    @endforeach

    <tr><td colspan="5"></td></tr>

    <tr>
        <th colspan="5">Ringkasan Metode Pembayaran</th>
    </tr>

    @foreach($paymentSummary as $method => $sum)
    <tr>
        <td colspan="2">{{ $method }}</td>
        <td>{{ $sum['count'] }} transaksi</td>
        <td colspan="2">Rp {{ number_format($sum['total'],0,',','.') }}</td>
    </tr>
    @endforeach
</table> 
</body>
</html>