<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservasi;
use Carbon\Carbon;

class KadaluarsaReservasiCommand extends Command
{
    protected $signature = 'reservasi:kadaluarsa';
    protected $description = 'Menandai reservasi sebagai kadaluarsa jika lewat 15 menit tanpa pembayaran';

    public function handle()
    {
        $batasWaktu = Carbon::now()->subMinutes(15);

        $kadaluarsa = Reservasi::where('status', 'menunggu_konfirmasi')
            ->where('created_at', '<=', $batasWaktu)
            ->update(['status' => 'dibatalkan']);

        $this->info("$kadaluarsa reservasi ditandai sebagai kadaluarsa.");
    }
}
