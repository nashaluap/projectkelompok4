<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Chat;
use Illuminate\Support\Facades\DB;


class C_Chat extends Controller
{
    public function index()
    {
        $id_user = auth()->user()->id;
        $pelanggan = DB::table('tb_pelanggan1')
            ->where('id_user', $id_user)
            ->first();

        if (!$pelanggan) {
            return redirect()->back()->with('error');
        }

        // Ambil semua chat
        $chat = M_Chat::where('id_pelanggan', $pelanggan->id_pelanggan)
            ->orderBy('created_at')
            ->get();

        // Hitung pesan baru dari admin
        $pesanBaru = M_Chat::where('id_pelanggan', $pelanggan->id_pelanggan)
            ->where('pengirim', 'admin')
            ->where('is_read', false)
            ->count();

        return view('v_chathanna', [
            'chat' => $chat,
            'id_pelanggan' => $pelanggan->id_pelanggan,
            'pesanBaru' => $pesanBaru
        ]);
    }               

    public function kirim(Request $request)
    {

    $id_user = auth()->user()->id;
    $pelanggan = DB::table('tb_pelanggan1')
        ->where('id_user', $id_user)
        ->first();

    if (!$pelanggan) {
        return redirect()->back()->with('error');
    }

    M_Chat::create([
        'id_pelanggan' => $pelanggan->id_pelanggan, 
        'pesan' => $request->pesan,
        'pengirim' => 'pelanggan',
        'is_read' => false,
        'tipe_pesan' => 'teks',
    ]);

    return redirect()->back()->with('success', 'Pesan berhasil dikirim');
    }

}
