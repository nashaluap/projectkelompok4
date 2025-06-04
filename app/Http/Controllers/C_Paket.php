<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Paket;
use Illuminate\Support\Facades\DB;

class C_Paket extends Controller
{
    protected $M_Paket;
 
    public $timestamps = false;
    
    public function __construct()
    {
        $this->M_Paket = new M_Paket();
    }
    public function index()
    {
        $data = [
            'paket' => $this->M_Paket->allData(),
        ];
        return view('v_paket', $data);
    }
    public function detail($id_paket)
    {
        if (!$this->M_Paket->detailData($id_paket)) {
            abort(404);
        }
        $data = [
            'paket' => $this->M_Paket->detailData($id_paket)
        ];
        return view('v_detailpaket', $data);
    }
    public function add()
    {
        {
            // Ambil ID terakhir
            $last = DB::table('tb_paket')->orderBy('id_paket', 'desc')->first();
            
            if ($last) {
                $num = (int) substr($last->id_paket, 3) + 1;
                $newID = 'PK' . str_pad($num, 3, '0', STR_PAD_LEFT);
            } else {
                $newID = 'PK001';
            }
        
            return view('v_addpaket', ['newID' => $newID]);
        }
    }
 
    public function insert()
    {
        Request()->validate([
            'id_paket' => 'required|unique:tb_paket,id_paket|min:4|max:10',
            'paket' => 'required',  
            'uraian' => 'required',
            'foto_paket' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ],[// Ubah konversi keterangan validasi form id_paket dalam bahasa Indonesia
            'id_paket.required' => 'id_paket wajib di isi !',
            'id_paket.unique' => 'id_paket ini sudah terdaftar di database !',
            'id_paket.min' => 'id_paket minimal 4 karakter',
            'id_paket.max' => 'id_paket maksimal 10 karakter',
            'paket.required' => 'Nama paket wajib di isi !',
            'uraian' => 'uraian wajib di isi !',
            'foto_paket.required' => 'Foto paket wajib di isi !',
        ]);
        // Jika validasi tidak ada maka lakukan simpan data
        // Upload gambar/foto
        $file = Request()->foto_paket;
        $fileName = Request()->id_paket . '.' . $file->extension();
        $file->move(public_path('foto_paket'), $fileName);
 
        $data = [
            'id_paket' => Request()->id_paket,
            'paket' => Request()->paket,
            'uraian' => Request()->uraian,
            'foto_paket' => $fileName,
        ];
        $this->M_Paket->addData($data);
        return redirect()->route('paket')->with('pesan', 'Data berhasil ditambahkan !');
    }
 
    public function edit($id_paket)
    {
        if(!$this->M_Paket->detailData($id_paket)) {
            abort(404);
        }
 
        $data = ['paket' => $this->M_Paket->detailData($id_paket)
    ];
        return view('v_editpaket', $data);
    }
 
    public function update($id_paket)
{
    Request()->validate([
        'paket' => 'required',
        'uraian' => 'required',
        'foto_paket' => 'mimes:jpg,jpeg,png,bmp|max:1024', // hapus 'required'
    ],[
        'paket.required' => 'Nama paket wajib di isi !',
        'uraian.required' => 'uraian wajib di isi !',
        'foto_paket.mimes' => 'Format foto harus jpg, jpeg, png, atau bmp!',
        'foto_paket.max' => 'Ukuran foto maksimal 1 MB!',
    ]);

    if (Request()->hasFile('foto_paket')) {
        $file = Request()->foto_paket;
        $fileName = Request()->id_paket . '.' . $file->extension();
        $file->move(public_path('foto_paket'), $fileName);

        $data = [
            'paket' => Request()->paket,
            'uraian' => Request()->uraian,
            'foto_paket' => $fileName,
        ];
    } else {
        $data = [
            'paket' => Request()->paket,
            'uraian' => Request()->uraian,
            // jangan ubah foto jika tidak ada upload baru
        ];
    }

    $this->M_Paket->editData($id_paket, $data);

    return redirect()->route('paket')->with('pesan', 'Data berhasil diupdate !');
}
    public function delete($id_paket)
    {
        // Hapus atau delete foto
        $paket = $this->M_Paket->detailData($id_paket);
        if ($paket->foto_paket <> "") {
            unlink(public_path('foto_paket') . '/' . $paket->foto_paket);
        }
        $this->M_Paket->deleteData($id_paket);
        return redirect()->route('paket')->with('pesan', 'Data berhasil dihapus !');
    }
}
