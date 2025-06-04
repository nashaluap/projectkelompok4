<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Chat extends Model
{
    use HasFactory;

    protected $table = 'tb_chat';
    protected $fillable = [
        'id_pelanggan',
        'pesan',
        'pengirim',
        'is_read',
        'tipe_pesan',
    ];

    public $timestamps = true;
}
