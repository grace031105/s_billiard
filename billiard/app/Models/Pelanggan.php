<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pelanggan extends Authenticatable
{
    use Notifiable;

    protected $table = 'pelanggan';
    public $timestamps = false;

    protected $fillable = ['nama_pengguna', 'email', 'nomor_hp', 'kata_sandi'];

    // Laravel secara default pakai kolom 'password', tapi kamu pakai 'kata_sandi'
    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}
