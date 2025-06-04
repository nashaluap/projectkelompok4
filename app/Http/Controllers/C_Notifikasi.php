<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Notifikasi;

class C_Notifikasi extends Controller
{
     public function index()
    {

        $notifikasi = M_Notifikasi::where('id', auth()->id())->get(); 
        return view('v_notifikasi', compact('notifikasi'));
    }

}
