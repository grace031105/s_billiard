<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_pengguna',
        'email',
        'nomor_telepon',
        'kata_sandi',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'kata_sandi',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            // 'kata_sandi' => 'hashed', // tidak dipakai karena kita pakai custom mutator
        ];
    }

    /**
     * Mutator untuk mengenkripsi kata_sandi saat disimpan.
     */
    public function setKataSandiAttribute($value)
    {
        $this->attributes['kata_sandi'] = bcrypt($value);
    }
}