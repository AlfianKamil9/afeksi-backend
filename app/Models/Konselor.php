<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;
    protected $table = 'konselors';

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'email',
        'namaLengkap',
        'jenisKelamin',
        'noHP',
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
