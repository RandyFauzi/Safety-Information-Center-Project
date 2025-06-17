<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Kolom yang bisa diisi massal (misal: saat create).
     */
    protected $fillable = [
        'nik',
        'name',
        'jabatan',
        'departemen',
        'status',
        'tanggal_masuk',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang disembunyikan saat dikirim sebagai JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Tipe data untuk casting otomatis.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
