<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Testimoni extends Model
{
    use HasFactory;

    protected $table = 'ulasan'; // nama tabel di database
    protected $primaryKey = 'id_ulasan'; // primary key tabel
    protected $fillable = [
        'id_pesanan',
        'id_pelanggan',
        'rating',
        'ulasan',
        'created_at'
    ];
    public $timestamps = false; // karena kolom 'updated_at' tidak ada

    public function testimoni()
    {
        return $this->hasMany(M_Testimoni::class, 'id_pesanan');
    }

    public function pesanan()
    {
    return $this->belongsTo(M_Pesanan::class, 'id_pesanan');
    }
}
