<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pemilik extends Authenticatable
{
    use Notifiable;

    protected $table = 'pemilik';
    protected $primaryKey = 'id_pemilik';
    public $timestamps = false;


    protected $fillable = [
        'nama_pemilik', 'email', 'kata_sandi',
    ];

    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}
