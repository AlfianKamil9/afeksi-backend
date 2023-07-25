<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketProfesionalConseling extends Model
{
    use HasFactory;
    private $table = 'paket_profesional_conselings';
    protected $fillable = [
        'nama_paket',
        'status',
        'harga',
    ];
}
