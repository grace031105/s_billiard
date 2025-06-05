<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResiPenyewaan extends Model
{
    protected $table = 'resi_penyewaan';
    protected $primaryKey = 'id_resi'; // GANTI dengan nama kolom primary key di database
    public $incrementing = false; // false kalau bukan auto-increment
    protected $keyType = 'int';  // string kalau kolomnya VARCHAR
}
