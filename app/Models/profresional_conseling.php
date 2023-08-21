<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profresional_conseling extends Model
{
    use HasFactory;

    protected $table = "profresional_conselings";
    protected $fillable = [
        'jenis_layanan',
        "namaPengalaman",
        'slug'
    ];

    // public function pembayaran_layanan()
    // {
    //     return $this->hasMany(PembayaranLayanan::class);
    // }

    public function paket_professional_conseling()
    {
        return $this->hasMany(PaketProfessionalConseling::class, 'professional_conseling_id', 'id_profConseling');
    }

    public function psikologs()
    {
        return $this->hasMany(Psikolog::class, 'professional_conseling_id', 'id');
    }
}
