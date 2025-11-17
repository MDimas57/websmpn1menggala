<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BidangHumas extends Model
{
        protected $fillable = [
        'foto',
        'nama',
        'jabatan',
        'deskripsi',
        'file_upload',
    ];
}
