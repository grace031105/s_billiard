<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Daftarkan semua command Artisan.
     */
    protected $commands = [
        \App\Console\Commands\ExpireReservasi::class,
    ];

    /**
     * Jadwalkan perintah Artisan di sini.
     */
    protected function schedule(Schedule $schedule)
    {
       $schedule->command('reservasi:expire')->everyMinute();
    }

    /**
     * Daftarkan perintah artisan untuk aplikasi.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
    }
}
