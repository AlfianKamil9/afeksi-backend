<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Psikolog extends Model
{
    use HasFactory;
    protected $table = 'psikologs';
    protected $fillable = [
        'nama_psikolog',
        'rating',
        'profil',
        'deskripsi',
        'keahlian',
        'avatar'
    ];

    public function webinar_sesi() {
        return $this->belongsTo(EventMaterialSession::class, 'pembicara_id');
    }
}
