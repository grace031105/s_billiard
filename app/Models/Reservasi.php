<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';
    protected $primaryKey = 'id_reservasi';
    public $timestamps = false;

    // Relasi ke tabel pelanggan
    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id_pelanggan');
    }

    // Relasi ke tabel meja_billiard
    public function meja()
    {
        return $this->belongsTo(Meja::class, 'id_meja');
    }

    // Relasi ke tabel waktu_sewa
    public function waktu()
    {
        return $this->belongsTo(WaktuSewa::class, 'id_waktu');
    }
    public function transaksi()
    {
        return $this->hasOne(TransaksiPembayaran::class, 'id_reservasi');
    }
}
