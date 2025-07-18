<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiPembayaran extends Model
{
    use HasFactory;

    protected $table = 'transaksi_pembayaran';
    protected $primaryKey = 'id_transaksi';
    public $timestamps = false;

    protected $fillable = [
        'metode_pembayaran',
        'id_reservasi',
        'tanggal_transaksi',
        'total_bayar',
        'bukti_pembayaran',
        'status',
        'id_pemilik',
        'kode_transaksi'
    ];

   public function reservasi()
    {
        return $this->hasMany(Reservasi::class, 'id_transaksi', 'id_transaksi');
    }

}
