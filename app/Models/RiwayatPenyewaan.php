<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenyewaan extends Model
{
    protected $table = 'resi_penyewaan';
    protected $fillable = ['resi', 'tipe', 'tanggal_cetak'];
}
