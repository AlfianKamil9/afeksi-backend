<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class internshipPosition extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $filiable = [
        'nama_posisi',
        'slug',
        'jobdesc',
        'status',
        'kualifikasi'
    ];
}
