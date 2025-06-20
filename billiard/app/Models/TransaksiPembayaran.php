<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pembayaran';   // Nama tabel di DB
    protected $primaryKey = 'id_transaksi';      // PK di tabelmu
    public $timestamps = false;                   // Kalau tidak ada created_at / updated_at
}
