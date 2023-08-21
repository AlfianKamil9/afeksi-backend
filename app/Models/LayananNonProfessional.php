<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananNonProfessional extends Model
{
    use HasFactory;

    protected $table = 'layanan_non_professionals';
    protected $guarded = ['id'];
    protected $fillable = [
        'jenis_layanan',
        'nama_layanan',
        'slug'
    ];

    public function paket_layanan_non_professionals()
    {
        return $this->hasMany(PaketLayananNonProfessional::class, 'layanan_non_professionals_id', 'id');
    }

    public function psikologs()
    {
        return $this->hasMany(Psikolog::class, 'layanan_non_professionals_id', 'id');
    }
}
