<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilSekolah extends Model
{
    use HasFactory;

    protected $fillable = [
        'logo',
        'nama_sekolah',
        'akreditasi',
        'jumlah_rombel',
        'jumlah_tenaga_pendidik',
        'jumlah_peserta_didik', 
        'deskripsi',
    ];
}
