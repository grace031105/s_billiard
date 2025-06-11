<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja_billiard';
    public $timestamps = false;
    protected $fillable = ['kode_meja', 'nama_meja', 'tipe_meja', 'foto_meja', 'harga_per_jam', 'status_meja'];
}
?>