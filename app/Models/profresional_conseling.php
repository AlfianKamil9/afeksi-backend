<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profresional_conseling extends Model
{
    use HasFactory;

    protected $table = "profresional_conselings";
    protected $fillable = ["namaPengalaman"];

    public function pembayaran_layanan()
    {
        return $this->hasMany(PembayaranLayanan::class);
    }
}
