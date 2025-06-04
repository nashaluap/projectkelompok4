<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Pelanggan extends Model
{
    protected $table = 'tb_pelanggan1';
    protected $primaryKey = 'id_pelanggan';
    public $incrementing = false; // Kalau ID pakai string (misal: PG0001)
    protected $keyType = 'string';
    public function allData()
    {
    return DB::table('tb_pelanggan1')->get();
    }
    public function detailData($id_pelanggan)
    {
    return DB::table('tb_pelanggan1')->where('id_pelanggan', $id_pelanggan)->first();
    }
    public function editData($id_pelanggan, $data) 
    { 
    DB::table('tb_pelanggan1')->where('id_pelanggan', $id_pelanggan)->update($data); 
    }
    public function deleteData($id_pelanggan)
    { 
        DB::table('tb_pelanggan1')->where('id_pelanggan', $id_pelanggan)->delete();
    }
    public function user()
    {
    return $this->belongsTo(User::class, 'id_user');
    }
}
