<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Pesanan extends Model
{
    use HasFactory;
    protected $table = 'tb_pesanan'; // <-- Tabel kamu di database
    protected $primaryKey = 'id_pesanan'; // Primary key tabel
    public $timestamps = false; // Kalau tidak ada created_at dan updated_at

    protected $fillable = [
        'id_pelanggan',
        'nama_pemesan',
        'alamat',
        'no_wa',
        'tgl_pesanan',
        'catatan',
        'total_harga',
        'total_pesanan',
    ];
    
    public function allData()
    {
        return DB::table('tb_pesanan')->get();
    }
    public function detailData($id_pesanan)
    {
        return DB::table('tb_pesanan')->where('id_pesanan', $id_pesanan)->first();
    }
    public function deleteData($id_pesanan)
    { 
    DB::table('tb_pesanan')->where('id_pesanan', $id_pesanan)->delete();
    }
    

}
