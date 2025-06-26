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
        // Kirim data notifikasi ke komponen header-meja
        View::composer('components.header-meja', function ($view) {
            $notifikasi = Reservasi::with('pelanggan')
                ->where('status', 'menunggu_konfirmasi')
                ->get();

            $view->with('notifikasiReservasi', $notifikasi);
        });
    }
}
