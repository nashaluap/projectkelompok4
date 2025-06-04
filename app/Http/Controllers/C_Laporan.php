<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\M_Pesanan;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class C_Laporan extends Controller
{
    public function index()
    {
        return view('v_laporan');
    }
 
    public function cetakTransaksi(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
 
        $pesanan = M_Pesanan::whereMonth('created_at', $bulan)
                              ->whereYear('created_at', $tahun)
                              ->get();

        $pdf = PDF::loadView('v_printtransaksi', compact('pesanan', 'bulan', 'tahun'));
        return $pdf->stream('laporan_transaksi.pdf');
       
    }
 
    public function cetakMenuTerlaris()
    {
    $menuTerlaris = DB::table('tb_pesanan_menu as d')
        ->join('tb_menu as m', 'd.id_menu', '=', 'm.id_menu')
        ->select('d.id_menu', 'm.nama_menu', DB::raw('SUM(d.qty) as total_terjual'))
        ->groupBy('d.id_menu', 'm.nama_menu')
        ->orderByDesc('total_terjual')
        ->get();

    $pdf = PDF::loadView('v_printmenuterlaris', compact('menuTerlaris'));
    return $pdf->stream('laporan_menu_terlaris.pdf');
    }
   
}
