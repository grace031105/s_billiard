<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatPenyewaan extends Model
{
    protected $table = 'riwayat_penyewaan';
    protected $fillable = ['resi', 'tipe', 'tanggal'];
}
