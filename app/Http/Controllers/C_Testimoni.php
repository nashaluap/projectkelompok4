<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Testimoni;
use App\Models\M_Pesanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class C_Testimoni extends Controller
{
    public function index()
    {
        $testimoni = M_Testimoni::all();
        return view('v_testimoni', compact('testimoni'));
    }
    
    public function create()
    {
        // Ini HARUS pakai Model
        $pesanan = M_Pesanan::where('status', 'selesai')->get();
        return view('v_addtestimoni', compact('pesanan'));
    }
    
    public function store(Request $request)
    {

        $request->validate([
        'id_pesanan' => 'required|exists:tb_pesanan,id_pesanan', 
        'komentar' => 'required|string',
        'rating' => 'required|integer|min:1|max:5',
    ]);
    if ($request->id_pesanan == 0) {
        return redirect()->back()->with('error', 'Pesanan tidak valid!');

    }

    $id_user = Auth::id();
    $pelanggan = DB::table('tb_pelanggan1')->where('id_user', $id_user)->first();

    if (!$pelanggan) {
        return redirect()->back()->with('error', 'Data pelanggan tidak ditemukan.');
    }


    M_Testimoni::create([
        'id_pesanan' => $request->id_pesanan,
        'id_pelanggan' => $pelanggan->id_pelanggan,
        'ulasan' => $request->komentar,
        'rating' => $request->rating,
        'created_at' => now(),
    ]);

    return redirect()->route('ulasan.index')->with('success', 'Testimoni berhasil dikirim!');
    }

}