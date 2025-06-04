<?php

namespace App\Models;

use App\Http\Controllers\C_Menu;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_PesananMenu extends Model
{
    use HasFactory;
    public function menu()
    {
    return $this->belongsTo(C_Menu::class, 'id_menu', 'id_menu');
    }
}
