<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoryPengambilanAPD extends Model
{
    // Nama tabel sesuai database
    protected $table = 'history_pengambilan_apd';

    // Jika kamu belum pakai $fillable, gunakan ini untuk izinkan semua kolom (sementara)
    protected $guarded = [];
}
