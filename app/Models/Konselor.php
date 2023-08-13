<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;
    protected $table = 'konselors';
<<<<<<< HEAD

    protected $fillable = [
        'user_id',
        'nohp',
        'jenisKelamin',
=======

    protected $guarded = ['id'];

    protected $fillable = [
        'user_id',
        'email',
        'namaLengkap',
        'jenisKelamin',
        'noHP',
>>>>>>> ddb31eb39c2e5bab0191e86868bc9902e36efb43
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