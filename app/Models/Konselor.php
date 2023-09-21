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
        'nama', 'pendidikan', 'avatar', 'profile', 'deskripsi'
    ];

    public function topic() {
        return $this->hasMany(konselorTopic::class);
    }

}