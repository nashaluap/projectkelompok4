<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Cart extends Model
{
    protected $table = 'tb_cart';
    protected $primaryKey = 'id_cart'; 
    public $timestamps = true; 

    protected $fillable = [
        'id_user', 'id_menu', 'quantity',
    ];

   public function menu()
    {
    return $this->belongsTo(M_Menu::class, 'id_menu', 'id_menu');
    }
}
