<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranLayanan extends Model
{
    use HasFactory;

    protected $table = 'pembayaran_layanans';

    protected $fillable = [
        'voucher_id',
        'paket_professional_conseling_id',
        'mentoring_id',
        'conseling_id',
        'profesional_conseling_id',
        'psikolog_id',
        'user_id',
        'sub_total',
        'total',
        'status'
    ];

    // public function voucher()
    // {
    //     return $this->belongsTo(Voucher::class, 'voucher_id', 'id');
    // }

    // public function paket_professional_conseling()
    // {
    //     return $this->belongsTo(PaketProfessionalConseling::class, 'paket_professional_conseling_id', 'id');
    // }

    public function mentoring()
    {
        return $this->belongsTo(Mentoring::class, 'mentoring_id', 'id');
    }

    public function conseling()
    {
        return $this->belongsTo(Conseling::class, 'conseling_id', 'id');
    }

    public function professional_conseling_id()
    {
        return $this->belongsTo(profresional_conseling::class, 'profesional_conseling_id', 'id');
    }

    // public function psikolog_id()
    // {
    //     return $this->belongsTo(Psikolog::class, 'psikolog_id', 'id');
    // }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
