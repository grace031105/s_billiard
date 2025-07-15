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
        'nama_meja',
        'foto_meja',
        'id_kategori' 
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}
