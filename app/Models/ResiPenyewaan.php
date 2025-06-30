<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResiPenyewaan extends Model
{
    protected $table = 'resi_penyewaan';
    protected $primaryKey = 'id_resi'; // GANTI dengan nama kolom primary key di database
    public $incrementing = true;
    protected $keyType = 'int';  // string kalau kolomnya VARCHAR
    public $timestamps = false;
    protected $fillable = [
        'id_transaksi',
        'tanggal_cetak',
        'kode_resi',
    ];
    public function transaksi()
    {
        return $this->belongsTo(\App\Models\TransaksiPembayaran::class, 'id_transaksi');
    }

}
