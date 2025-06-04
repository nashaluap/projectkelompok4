<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\M_Chat;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('layout.v_topbar', function ($view) {
            $jumlahPesan = M_Chat::where('pengirim', 'pelanggan')
                                 ->where('is_read', false)
                                 ->count();

            $view->with('jumlahPesan', $jumlahPesan);
        });
    }
}
