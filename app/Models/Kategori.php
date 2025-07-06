<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategori'; // pakai singular, sesuai nama tabel
    protected $primaryKey = 'id_kategori';

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'harga_default',
        'warna_label',
    ];

    public function meja()
    {
        return $this->hasMany(Meja::class, 'id_kategori');
    }
}
