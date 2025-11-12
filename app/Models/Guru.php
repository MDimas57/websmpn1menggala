<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
        protected $fillable = [
        'nama_lengkap',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_gtk',
        'foto',
    ];
}
