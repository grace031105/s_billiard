<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    use HasFactory;
    protected $table = 'meja';
    public $timestamps = false;
    protected $fillable = ['nama_meja', 'tipe_meja', 'foto_meja', 'harga_perjam', 'status_meja'];
}
?>