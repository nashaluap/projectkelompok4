<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayaran'; // nama tabel di database

    protected $primaryKey = 'id_pembayaran'; // primary key

    public $timestamps = true; // aktifkan created_at dan updated_at

    protected $fillable = [
        'id_pesanan',
        'tipe_pembayaran',
        'nominal',
        'id_bank',
        'tgl_pembayaran',
        'batas_waktu',
    ];

    public function pesanan()
    {
        return $this->belongsTo(M_Pesanan::class, 'id_pesanan', 'id_pesanan');
    }

    public function bank()
    {
    return $this->belongsTo(M_Bank::class, 'id_bank', 'id');
    }
}
