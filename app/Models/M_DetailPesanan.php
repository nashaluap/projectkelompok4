<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_DetailPesanan extends Model
{
    use HasFactory;
    protected $table = 'tb_pesanan_menu'; // ganti dengan nama tabel yang benar

    protected $primaryKey = 'id_detail';
    
    protected $fillable = [
        'id_pesanan',
        'id_menu',
        'qty',
        'subtotal',
    ];
}
