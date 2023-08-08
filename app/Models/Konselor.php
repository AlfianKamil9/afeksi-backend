<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;
    protected $table = 'volunteers';

    protected $fillable = [
        'user_id',
        'pekerjaan',
        'instansi',
        'divisi',
        'cv',
        'portofolio',
        'alasan',
        'bukti_follow',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
