<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// Ganti 'ppdb' (kecil) menjadi 'Ppdb' (BESAR)
class Ppdb extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'foto',
    ];
}