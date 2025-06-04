<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Bank;
use App\Models\M_Pembayaran;
use Illuminate\Support\Facades\DB;

class C_Bank extends Controller
{
    protected $M_Bank;
 
    public $timestamps = false;

    public function __construct()
    {
        $this->M_Bank = new M_Bank();
    }
    public function index()
    {
        $data = [
            'bank' => $this->M_Bank->allData(),
        ];
        return view('v_bank', $data);
    }
    public function detail($id_bank)
    {
        if (!$this->M_Bank->detailData($id_bank)) {
            abort(404);
        }
        $data = [
            'bank' => $this->M_Bank->detailData($id_bank)
        ];
        return view('v_detailbank', $data);
    }
    public function add()
    {
        return view('v_addbank');
    }
 
    public function insert()
    {
        Request()->validate([
            'id_bank' => 'required|unique:tb_bank,id_bank|min:4|max:10',
            'atas_nama' => 'required',
            'nama_bank' => 'required',  
            'no_rekening' => 'required',
            'foto_bank' => 'required|mimes:jpg,jpeg,png,bmp|max:1024',
        ],[// Ubah konversi keterangan validasi form id_bank dalam bahasa Indonesia
            'id_bank.required' => 'id_bank wajib di isi !',
            'id_bank.min' => 'id_bank minimal 4 karakter',
            'id_bank.max' => 'id_bank maksimal 10 karakter',
            'atas_nama.required' => 'Nama pemilik rekening wajib di isi !',
            'nama_bank.required' => 'Nama bank wajib di isi !',
            'no_rekening.required' => 'Nomor rekening wajib di isi !',
            'foto_bank.required' => 'Foto bank wajib di isi !',
        ]);
        // Jika validasi tidak ada maka lakukan simpan data
        // Upload gambar/foto
        $file = Request()->foto_bank;
        $fileName = Request()->id_bank . '.' . $file->extension();
        $file->move(public_path('foto_bank'), $fileName);
 
        $data = [
            'id_bank' => Request()->id_bank,
            'atas_nama' => Request()->atas_nama,
            'nama_bank' => Request()->nama_bank,
            'no_rekening' => Request()->no_rekening,
            'foto_bank' => $fileName,
        ];
        $this->M_Bank->addData($data);
        return redirect()->route('bank')->with('pesan', 'Data berhasil ditambahkan !');
    }
 
    public function edit($id_bank)
    {
        if(!$this->M_Bank->detailData($id_bank)) {
            abort(404);
        }
 
        $data = ['bank' => $this->M_Bank->detailData($id_bank)
    ];
        return view('v_editbank', $data);
    }
 
    public function update($id_bank)
    {
        Request()->validate([
            'atas_nama' => 'required',
            'nama_bank' => 'required',  
            'no_rekening' => 'required',
            'foto_bank' => 'mimes:jpg,jpeg,png,bmp|max:1024',
        ], [
            'atas_nama.required' => 'Nama pemilik rekening wajib di isi !',
            'nama_bank.required' => 'Nama bank wajib di isi !',
            'no_rekening.required' => 'Nomor rekening wajib di isi !',
            'foto_bank.mimes' => 'Format foto harus jpg, jpeg, png, atau bmp!',
        ]);
    
        // Ambil data lama
        $bank = $this->M_Bank->detailData($id_bank);
    
        // Cek apakah ada file yang diupload
        if (Request()->hasFile('foto_bank')) {
            // Hapus foto lama jika ada
            if ($bank->foto_bank && file_exists(public_path('foto_bank/' . $bank->foto_bank))) {
                unlink(public_path('foto_bank/' . $bank->foto_bank));
            }
    
            // Upload file baru
            $file = Request()->file('foto_bank');
            $fileName = Request()->id_bank . '.' . $file->extension();
            $file->move(public_path('foto_bank'), $fileName);
        } else {
            // Tidak ada file baru, pakai yang lama
            $fileName = $bank->foto_bank;
        }
    
        // Simpan data
        $data = [
            'atas_nama' => Request()->atas_nama,
            'nama_bank' => Request()->nama_bank,
            'no_rekening' => Request()->no_rekening,
            'foto_bank' => $fileName,
        ];
    
        $this->M_Bank->editData($id_bank, $data);
    
        return redirect()->route('bank')->with('pesan', 'Data berhasil diupdate !');
    }
    
    public function delete($id_bank)
    {
        // Hapus atau delete foto
        $bank = $this->M_Bank->detailData($id_bank);
        if ($bank->foto_bank <> "") {
            unlink(public_path('foto_bank') . '/' . $bank->foto_bank);
        }
        $this->M_Bank->deleteData($id_bank);
        return redirect()->route('bank')->with('pesan', 'Data berhasil dihapus !');
    }

    public function pilihBank($id_pembayaran)
    {
    $pembayaran = M_Pembayaran::findOrFail($id_pembayaran);
    $banks = M_Bank::all();

    return view('v_pilih_bank', compact('pembayaran', 'banks'));
    }

}
