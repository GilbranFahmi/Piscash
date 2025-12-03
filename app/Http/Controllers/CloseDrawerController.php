<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\OpenDrawer;
use App\Models\CloseDrawer;
use App\Models\Transaksi;
use App\Models\Kasir;
use Carbon\Carbon;
use App\Exports\DrawerReportExport;
use Maatwebsite\Excel\Facades\Excel;


class CloseDrawerController extends Controller
{
    /**
     * Halaman utama Close Drawer:
     * - Ringkasan drawer hari ini
     * - Tabel transaksi hari ini
     * - Tabel riwayat drawer sebelumnya
     */
    public function index()
    {
        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $kasir = Kasir::find($kasirId);
        if (!$kasir) {
            return redirect('/login')->with('error', 'Kasir tidak ditemukan.');
        }

        $today = Carbon::today('Asia/Jakarta');

        // Drawer yang sedang aktif (hari ini) jika ada
        $drawer = OpenDrawer::where('kasir_id', $kasirId)
            ->whereDate('waktu_buka', $today)
            ->orderBy('waktu_buka', 'desc')
            ->first();

        $saldo_awal = $drawer->saldo_awal ?? 0;
        $waktu_buka = $drawer->waktu_buka ?? null;

        // Transaksi untuk hari ini (drawer mengikuti hari)
        $transaksi = Transaksi::where('kasir_id', $kasirId)
            ->whereDate('created_at', $today)
            ->orderBy('created_at', 'asc')
            ->get();

        $total_masuk = $transaksi->sum('total_harga');

        // Riwayat semua close drawer milik kasir, terbaru di atas
        $closeList = CloseDrawer::where('kasir_id', $kasirId)
            ->orderBy('waktu_tutup', 'desc')
            ->get();

        $status = $drawer ? 'Aktif' : 'Tidak Aktif';

        return view('drawer.close-drawer', compact(
            'kasir',
            'drawer',
            'waktu_buka',
            'saldo_awal',
            'transaksi',
            'total_masuk',
            'closeList',
            'status'
        ));
    }

    /**
     * Menutup drawer untuk hari ini.
     * Drawer mengikuti hari, jadi transaksi yang dihitung adalah
     * semua transaksi kasir pada tanggal hari ini.
     */
    public function store(Request $request)
    {
        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $request->validate([
            'uang_keluar' => 'nullable|numeric|min:0',
        ]);

        $uang_keluar = $request->input('uang_keluar', 0);

        $today = Carbon::today('Asia/Jakarta');

        // Ambil drawer aktif hari ini (kalau ada) untuk saldo_awal.
        $drawer = OpenDrawer::where('kasir_id', $kasirId)
            ->whereDate('waktu_buka', $today)
            ->orderBy('waktu_buka', 'desc')
            ->first();

        if (!$drawer) {
            return redirect()->back()->with('error', 'Tidak ada drawer yang sedang aktif untuk hari ini.');
        }

        $saldo_awal = $drawer->saldo_awal ?? 0;

        // Total penjualan hari ini
        $total_masuk = Transaksi::where('kasir_id', $kasirId)
            ->whereDate('created_at', $today)
            ->sum('total_harga');

        $saldo_akhir = $saldo_awal + $total_masuk - $uang_keluar;

        // Simpan riwayat close drawer (per hari)
        CloseDrawer::create([
            'kasir_id'    => $kasirId,
            'waktu_tutup' => Carbon::now('Asia/Jakarta'),
            'saldo_awal'  => $saldo_awal,
            'uang_masuk'  => $total_masuk,
            'saldo_akhir' => $saldo_akhir,
        ]);

        // Drawer hari ini dianggap selesai → hapus/open baru
        $drawer->delete();

        return redirect()->route('close-drawer.index')
            ->with(
                'success',
                'Drawer berhasil ditutup! Saldo akhir: Rp ' . number_format($saldo_akhir, 0, ',', '.')
            );
    }

    /**
     * Detail satu drawer (untuk fitur "Lihat Selengkapnya"):
     * - List transaksi
     * - Ringkasan metode pembayaran (Tunai, QRIS, MasterCard, Debit, Kredit)
     *
     * View-nya: resources/views/drawer/history.blade.php (nanti kamu buat sendiri)
     */
    public function history($id)
    {
        $kasirId = Session::get('kasir_id');
        if (!$kasirId) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        $drawer = CloseDrawer::with('kasir')->where('kasir_id', $kasirId)->findOrFail($id);

        // Drawer mengikuti hari → pakai tanggal dari waktu_tutup
        $tanggal = $drawer->tanggal_drawer; // accessor di model

        $baseQuery = Transaksi::where('kasir_id', $drawer->kasir_id)
            ->whereDate('created_at', $tanggal);

        $transaksi = (clone $baseQuery)
            ->orderBy('created_at', 'asc')
            ->get();

        $paymentSummary = $this->buildPaymentSummary($baseQuery);

        // Data siap untuk view history drawer
        return view('drawer.history', [
            'drawer'         => $drawer,
            'tanggal'        => $tanggal,
            'transaksi'      => $transaksi,
            'paymentSummary' => $paymentSummary,
        ]);
    }

    public function export($id)
{
    $drawer = CloseDrawer::findOrFail($id);

    return Excel::download(
        new DrawerReportExport($drawer),
        'Drawer_Report_'.$drawer->id.'.xlsx'
    );
}

    /**
     * Helper untuk menghitung ringkasan metode pembayaran.
     *
     * Return contoh:
     * [
     *   'Tunai' => ['count' => 5, 'total' => 300000],
     *   'QRIS'  => ['count' => 2, 'total' => 120000],
     *   ...
     *   'ALL'   => ['count' => 7, 'total' => 420000],
     * ]
     */
    protected function buildPaymentSummary($baseQuery): array
    {
        $methods = ['Tunai', 'QRIS', 'MasterCard', 'Debit', 'Kredit'];
        $summary = [];

        foreach ($methods as $method) {
            $q = clone $baseQuery;

            $summary[$method] = [
                'count' => $q->where('metode', $method)->count(),
                'total' => $q->where('metode', $method)->sum('total_harga'),
            ];
        }

        $qAll = clone $baseQuery;
        $summary['ALL'] = [
            'count' => $qAll->count(),
            'total' => $qAll->sum('total_harga'),
        ];

        return $summary;
    }
}
