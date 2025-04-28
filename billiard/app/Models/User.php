<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nama_pengguna', 
        'email', 
        'nomor_telepon', 
        'kata_sandi',
    ];

    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }

    // Override untuk handle hashing password
    public function setKataSandiAttribute($value)
    {
        $this->attributes['kata_sandi'] = bcrypt($value);
    }
}
