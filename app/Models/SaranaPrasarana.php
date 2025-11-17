<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaranaPrasarana extends Model
{
        protected $fillable = [
        'foto',
        'nama',
        'jabatan',
        'deskripsi',
        'file_upload',
    ];
}
