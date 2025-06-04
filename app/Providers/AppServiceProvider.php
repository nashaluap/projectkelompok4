<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\M_Cart;
use App\Models\M_Pesanan;


class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
    View::composer('*', function ($view) {
        $cartCount = 0;
        if (auth()->check()) {
            $cartCount = M_Cart::where('id_user', auth()->id())->count();
        }
        $view->with('cartCount', $cartCount);
    });

    // Bagikan data notifikasi ke view topbar
    View::composer('layout.v_topbar', function ($view) {
       $jumlahNotifikasi = M_Pesanan::where('status', 'baru')->count();
       $notifikasiPesanan = M_Pesanan::where('status', 'baru')->latest()->get();
       $view->with(compact('jumlahNotifikasi', 'notifikasiPesanan'));
    });
    }
    public function register()
    {
        //
    }


}
