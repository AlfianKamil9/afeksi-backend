<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;
    protected $table = 'konselors';

    protected $fillable = [
        'user_id',
        'nohp',
        'jenisKelamin',
        'pekerjaan',
        'instansi',
        'divisi',
        'alasan',
        'bukti_follow',
        'cv',
        'portofolio',
        'type',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}