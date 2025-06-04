<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Notifikasi extends Model
{
    use HasFactory;

    protected $table = 'notifikasi'; 

    protected $fillable = [
        'id', 'judul', 'pesan', 'dibaca'
    ];
}
