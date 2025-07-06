<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;

    protected $table = 'meja_billiard';
    protected $primaryKey = 'id_meja';
    public $timestamps = false;

    protected $fillable = [
        'kode_meja',
        'nama_meja',
        'foto_meja',
        'status_meja',
        'id_kategori' // ini foreign key ke tabel kategori
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
