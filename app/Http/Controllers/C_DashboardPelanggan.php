<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\M_Pelanggan;
use App\Models\M_Pesanan;

class C_DashboardPelanggan extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $pesanan = M_Pesanan::where('id_pelanggan', $user->id)->orderBy('created_at', 'desc')->get();

        return view('pelanggan.v_dashboard', compact('user', 'pesanan'));
    }

    public function detail($id_pesanan)
    {
        $id_pelanggan = Auth::user()->id_pelanggan;

        $pesanan = DB::table('tb_pesanan')
            ->where('id_pesanan', $id_pesanan)
            ->where('id_pelanggan', $id_pelanggan)
            ->first();

        if (!$pesanan) {
            abort(403, 'Akses tidak diizinkan.');
        }

        $detail_menu = DB::table('tb_pesanan_menu')
            ->join('tb_menu', 'tb_pesanan_menu.id_menu', '=', 'tb_menu.id_menu')
            ->where('tb_pesanan_menu.id_pesanan', $id_pesanan)
            ->select(
                'tb_menu.nama_menu',
                'tb_pesanan_menu.qty AS jumlah_pesanan',
                'tb_pesanan_menu.subtotal'
            )
            ->get();

        return view('pelanggan.v_detailpesanan', [
            'pesanan' => $pesanan,
            'detail_menu' => $detail_menu,
        ]);
    }

}
