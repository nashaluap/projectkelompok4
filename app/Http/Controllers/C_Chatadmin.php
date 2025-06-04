<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Chat;
use Illuminate\Support\Facades\DB;

class C_Chatadmin extends Controller
{
    public function index($id_pelanggan)
    {
        $chat = M_Chat::where('id_pelanggan', $id_pelanggan)
            ->orderBy('created_at')
            ->get();

        $pelanggan = DB::table('tb_pelanggan1')
        ->where('id_pelanggan', $id_pelanggan)
        ->first();

        M_Chat::where('id_pelanggan', $id_pelanggan)
        ->where('pengirim', 'pelanggan')
        ->where('is_read', false)
        ->update(['is_read' => true]);


    return view('admin.v_chat', compact('chat', 'id_pelanggan', 'pelanggan'));
    }

    public function kirim(Request $request)
    {
        M_Chat::create([
        'id_pelanggan' => $request->id_pelanggan, 
        'pesan' => $request->pesan,
        'pengirim' => 'admin',
        'is_read' => false,
        'tipe_pesan' => 'teks',
    ]);

    return redirect()->back();
    }

    public function jumlahPesanBelumDibaca()
    {
        $jumlahPesan = M_Chat::where('pengirim', 'pelanggan')
            ->where('is_read', false)
            ->count();

        return view('admin.dashboard', compact('jumlahPesan'));
    }

    public function daftarPelanggan()
    {
    $pelanggan = DB::table('tb_pelanggan1')->get();

     $pesanBelumDibaca = DB::table('tb_chat')
        ->select('id_pelanggan', DB::raw('COUNT(*) as jumlah'))
        ->where('pengirim', 'pelanggan')
        ->where('is_read', false)
        ->groupBy('id_pelanggan')
        ->pluck('jumlah', 'id_pelanggan');

    return view('admin.v_chat_daftar_pelanggan', compact('pelanggan','pesanBelumDibaca'));
    }
}
