<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Pesanan;
use Illuminate\Support\Facades\DB;

class C_Pesanan extends Controller
{
    public function __construct()
    {
        $this->M_Pesanan = new M_Pesanan();
    }
    public function index()
    {
        $data = [
            'pesanan' => $this->M_Pesanan->allData(),
        ];
        return view('v_pesanan', $data);
    }
    
    public function detail($id_pesanan)
    {
         if (!$this->M_Pesanan->detailData($id_pesanan)) {
        abort(404);
    }

    // Ambil data utama pesanan
    $pesanan = $this->M_Pesanan->detailData($id_pesanan);

    // Ambil detail menu berdasarkan id_pesanan
    $detail_menu = DB::table('tb_pesanan_menu')
        ->join('tb_menu', 'tb_pesanan_menu.id_menu', '=', 'tb_menu.id_menu')
        ->where('tb_pesanan_menu.id_pesanan', $id_pesanan)
        ->select(
            'tb_menu.nama_menu',
            'tb_pesanan_menu.qty AS jumlah_pesanan',
            'tb_pesanan_menu.subtotal'
        )
        ->get();

    // Kirim ke view
    $data = [
        'pesanan' => $pesanan,
        'detail_menu' => $detail_menu
    ];

    return view('v_detailpesanan', $data);
    }

    public function delete($id_pesanan)
    {
        $pesanan = $this->M_Pesanan->detailData($id_pesanan);
        $this->M_Pesanan->deleteData($id_pesanan);
        return redirect()->route('pesanan')->with('pesan', 'Data berhasil dihapus !');
    }
    public function showPesanan()
    {
        // Ambil data pesanan dengan join ke tabel pelanggan
        $pesanan = DB::table('tb_pesanan')
            ->join('tb_pelanggan1', 'tb_pesanan.id_pelanggan', '=', 'tb_pelanggan1.id_pelanggan')
            ->join('tb_pesanan_menu', 'tb_pesanan.id_pesanan', '=', 'tb_pesanan_menu.id_pesanan')
            ->join('tb_menu', 'tb_pesanan_menu.id_menu', '=', 'tb_menu.id_menu')
            ->select('tb_pesanan.*', 'tb_pelanggan1.nama_pelanggan', 'tb_menu.nama_menu') // Menambahkan nama_pelanggan dan nama_menu
            ->get();
    
        // Kirim data pesanan ke view
        return view('v_pesanan', compact('pesanan'));
    }

    public function sukses()
    {
    return view('v_sukses');
    }
}
