<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Reservasi;
use Carbon\Carbon;

class ExpireReservasi extends Command
{
    protected $signature = 'reservasi:expire';

    protected $description = 'Mengubah status reservasi menjadi kadaluarsa jika melewati waktu batas';

    public function handle()
    {
        $now = \Carbon\Carbon::now();
        $this->info("Waktu sekarang: " . $now);

        $expired = Reservasi::where('status', 'menunggu_konfirmasi')
            ->where('expired_at', '<', $now)
            ->update(['status' => 'kadaluarsa']);

        $this->info("Reservasi kadaluarsa: $expired");
    }
}
