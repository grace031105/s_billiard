<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Reservasi;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $notifikasiReservasi = Reservasi::where('status', 'menunggu_konfirmasi')
                                    ->orderBy('id_reservasi', 'desc')
                                    ->limit(7)
                                    ->get();
            $view->with('notifikasiReservasi', $notifikasiReservasi);
        });
    }
    
}
