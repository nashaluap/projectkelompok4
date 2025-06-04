<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\M_Pesanan;
use Illuminate\Support\Facades\DB;

class C_Dashboard extends Controller
{
    public function index()
    {
     $bulan = Carbon::now()->month;
    $tahun = Carbon::now()->year;

    // Jumlah pesanan bulan ini (yang belum selesai)
       $jumlahPesananBulanan = M_Pesanan::whereMonth('tgl_pesanan', date('m'))
        ->whereYear('tgl_pesanan', date('Y'))
        ->where('status', '!=', 'selesai')
        ->count();

    // Pendapatan bulan ini
    $pendapatanBulanan = M_Pesanan::whereMonth('created_at', $bulan)
        ->whereYear('created_at', $tahun)
        ->sum('total_harga');

    // Total semua pesanan
    $totalPesanan = M_Pesanan::count();

    // Ambil pendapatan per bulan selama tahun ini
    $dataPendapatan = M_Pesanan::select(
            DB::raw('MONTH(created_at) as bulan'),
            DB::raw('SUM(total_harga) as total')
        )
        ->whereYear('created_at', $tahun)
        ->groupBy(DB::raw('MONTH(created_at)'))
        ->pluck('total', 'bulan')
        ->toArray();

    // Format data 12 bulan (Jan–Dec)
    $pendapatanBulan = [];
    for ($i = 1; $i <= 12; $i++) {
        $pendapatanBulan[] = $dataPendapatan[$i] ?? 0;
    }

    $jadwalPengambilan = M_Pesanan::where('status', '!=', 'selesai')
    ->whereNotNull('tgl_pesanan')
    ->get(['nama_pemesan', 'tgl_pesanan', 'alamat']);

    $notifikasiPesanan = M_Pesanan::where('status', 'baru')
    ->latest()
    ->take(5)
    ->get();

    $jumlahNotifikasi = M_Pesanan::where('status', 'baru')->count();

    return view('admin.v_dashboard', compact(
        'jumlahPesananBulanan',
        'pendapatanBulanan',
        'totalPesanan',
        'pendapatanBulan',
        'jadwalPengambilan',            
        'notifikasiPesanan',
        'jumlahNotifikasi'));
    }

}
