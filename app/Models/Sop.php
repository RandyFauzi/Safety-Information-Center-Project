<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sop extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_register',
        'nama_sop',
        'departemen',
        'tanggal_terbit',
        'tanggal_update',
        'file_sop',
    ];
}
