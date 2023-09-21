<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsikologMentoring extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama', 'pendidikan', 'avatar', 'profile', 'deskripsi'
    ];
    protected $guarded = ['id'];
}
