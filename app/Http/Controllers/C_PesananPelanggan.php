<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Pesanan;
use App\Models\M_Pelanggan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class C_PesananPelanggan extends Controller
{
    public function index()
    {
        $userId = Auth::id(); 

    $pelanggan = M_Pelanggan::where('id_user', $userId)->first();

    if (!$pelanggan) {
        return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan.');
    }

    $pesanan = M_Pesanan::where('id_pelanggan', $pelanggan->id_pelanggan)->get();

    return view('pelanggan.v_riwayat', compact('pesanan'));
    }

    public function show($id)
    {
    $pesanan = M_Pesanan::findOrFail($id);

    $userId = Auth::id();
    $pelanggan = M_Pelanggan::where('id_user', $userId)->first();

    if (!$pelanggan || $pesanan->id_pelanggan !== $pelanggan->id_pelanggan) {
        abort(403, 'Unauthorized access');
    }

    return view('pelanggan.v_detailpesanan', compact('pesanan'));
    }

}
