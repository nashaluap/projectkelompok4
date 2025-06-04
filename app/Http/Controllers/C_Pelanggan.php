<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Pelanggan;
use Illuminate\Support\Facades\DB;

class C_Pelanggan extends Controller
{
    public function __construct()
    {
        $this->M_Pelanggan = new M_Pelanggan();
    }
    public function index()
    {
        $data = [
            'pelanggan' => $this->M_Pelanggan->allData(),
        ];
        return view('v_pelanggan', $data);
    }
    public function edit($id_pelanggan)
    {
        if(!$this->M_Pelanggan->detailData($id_pelanggan)) {
            abort(404);
        }
 
        $data = ['pelanggan' => $this->M_Pelanggan->detailData($id_pelanggan)
    ];
        return view('v_editpelanggan', $data);
    }
 
    public function update($id_pelanggan)
{
    Request()->validate([
        'id_pelanggan' => 'required',
        'nama_pelanggan' => 'required',
        'alamat' => 'required',
        'no_telepon' => 'required',
        'email' => 'required'
    ], [
        'id_pelanggan.required' => 'id_pelanggan wajib di isi !',
        'id_pelanggan.min' => 'id_pelanggan minimal 4 karakter',
        'id_pelanggan.max' => 'id_pelanggan maksimal 10 karakter',
        'nama_pelanggan.required' => 'Nama pelanggan wajib di isi !',
        'alamat.required' => 'Alamat wajib di isi !',
        'no_telepon.required' => 'No Telepon wajib di isi !',
        'email.required' => 'Email wajib di isi !',
    ]);

    // Ambil data lama
    $pelanggan = $this->M_Pelanggan->detailData($id_pelanggan);

    // Data update
    $data = [
        'id_pelanggan' => Request()->id_pelanggan,
        'nama_pelanggan' => Request()->nama_pelanggan,
        'alamat' => Request()->alamat,
        'no_telepon' => Request()->no_telepon,
        'email' => Request()->email,
    ];

    $this->M_Pelanggan->editData($id_pelanggan, $data);

    return redirect()->route('pelanggan')->with('pesan', 'Data berhasil diupdate !');
    }

    public function delete($id_pelanggan)
    {
        $nama_pelanggan = $this->M_Pelanggan->deleteData($id_pelanggan);
        return redirect()->route('pelanggan')->with('pesan', 'Data berhasil dihapus !');
    }
}
