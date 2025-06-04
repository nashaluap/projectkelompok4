<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Paket extends Model
{
    protected $table = 'tb_paket';
 
    public $timestamps = false;

    public function allData()
    {
        return DB::table('tb_paket')->get();
    }
    public function detailData($id_paket)
    {
        return DB::table('tb_paket')->where('id_paket', $id_paket)->first();
    }
    public function addData($data) 
    { 
        DB::table('tb_paket')->insert($data); 
    } 
    public function editData($id_paket, $data) 
    { 
        DB::table('tb_paket')->where('id_paket', $id_paket)->update($data); 
    } 
    public function deleteData($id_paket)
    { 
        DB::table('tb_paket')->where('id_paket', $id_paket)->delete();
    }
}
