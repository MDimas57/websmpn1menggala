<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nik',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_gtk',
        'foto',
    ];

    /**
     * =======================================================
     * TAMBAHAN DI SINI
     * =======================================================
     * Memberi tahu Laravel bahwa 'tanggal_lahir' adalah objek Tanggal (Carbon).
     * Ini memungkinkan kita memformatnya dengan mudah di view nanti.
     */
    protected $casts = [
        'tanggal_lahir' => 'datetime',
    ];
}