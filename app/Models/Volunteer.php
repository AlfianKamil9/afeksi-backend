<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Volunteer extends Model
{
    use HasFactory;

    protected $table = 'konselors';

    public function user2()
    {
        return $this->belongsTo(User2::class, 'user_2_id', 'id_user');
    }
}
