<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Menu extends Model
{
    protected $table = 'tb_menu';
    protected $primaryKey = 'id_menu';
    public $incrementing = false; 
    protected $keyType = 'string';
    public $timestamps = true;

    public function allData()
    {
    return DB::table('tb_menu')
        ->join('tb_paket', 'tb_menu.id_paket', '=', 'tb_paket.id_paket')
        ->select('tb_menu.*', 'tb_paket.paket as nama_paket')
        ->get();
    }
    public function detailData($id_menu)
    {
        return DB::table('tb_menu')->where('id_menu', $id_menu)->first();
    }

    public function addData($data) 
    { 
    DB::table('tb_menu')->insert($data); 
    } 
    public function editData($id_menu, $data) 
    { 
    DB::table('tb_menu')->where('id_menu', $id_menu)->update($data); 
    } 
    public function deleteData($id_menu)
    { 
    DB::table('tb_menu')->where('id_menu', $id_menu)->delete();
    }
}
 
 