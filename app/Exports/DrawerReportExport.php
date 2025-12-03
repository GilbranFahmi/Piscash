<?php

namespace App\Exports;

use App\Models\CloseDrawer;
use App\Models\Transaksi;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Carbon\Carbon;

class DrawerReportExport implements FromView
{
    protected $drawer;

    public function __construct(CloseDrawer $drawer)
    {
        $this->drawer = $drawer;
    }

    public function view(): View
    {
        $tanggal = Carbon::parse($this->drawer->waktu_tutup)->toDateString();

        // Data transaksi hari tersebut
        $transaksi = Transaksi::where('kasir_id', $this->drawer->kasir_id)
            ->whereDate('created_at', $tanggal)
            ->get();

        // Rekap pembayaran
        $paymentSummary = [];
        $methods = ['Tunai', 'QRIS', 'MasterCard', 'Debit', 'Kredit'];

        foreach ($methods as $method) {
            $paymentSummary[$method] = [
                'count' => $transaksi->where('metode', $method)->count(),
                'total' => $transaksi->where('metode', $method)->sum('total_harga')
            ];
        }

        $paymentSummary['ALL'] = [
            'count' => $transaksi->count(),
            'total' => $transaksi->sum('total_harga')
        ];

        return view('exports.drawer-report', [
            'drawer'         => $this->drawer,
            'transaksi'      => $transaksi,
            'paymentSummary' => $paymentSummary,
            'tanggal'        => $tanggal
        ]);
    }
}
