<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class M_Bank extends Model
{
    protected $table = 'bank';
    protected $primaryKey = 'id_bank';
    public $timestamps = false;
    public $incrementing = false;
    protected $keyType = 'string';

    public function allData()
    {
        return DB::table('tb_bank')->get();
    }
    public function detailData($id_bank)
    {
        return DB::table('tb_bank')->where('id_bank', $id_bank)->first();
    }

    public function addData($data) 
    { 
    DB::table('tb_bank')->insert($data); 
    } 
    public function editData($id_bank, $data) 
    { 
    DB::table('tb_bank')->where('id_bank', $id_bank)->update($data); 
    } 
    public function deleteData($id_bank)
    { 
    DB::table('tb_bank')->where('id_bank', $id_bank)->delete();
    }
    
}
