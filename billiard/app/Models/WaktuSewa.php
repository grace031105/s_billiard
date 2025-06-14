<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaktuSewa extends Model
{
    use HasFactory;

    protected $table = 'waktu_sewa';   // sesuai nama tabel di database
    protected $primaryKey = 'id_waktu'; // kalau PK bukan 'id', tulis di sini
    public $timestamps = false;         // kalau tabel tidak pakai created_at & updated_at
}
