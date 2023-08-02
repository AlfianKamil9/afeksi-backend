<?php

namespace App\Models;

use App\Models\EventMaterialSession;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function webinar_session()
    {
        return $this->belongsTo(EventMaterialSession::class, 'pembicara_id');
    }
}