<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konselor extends Model
{
    use HasFactory;
    protected $table = 'volunteers';

    public function user2()
    {
        return $this->belongsTo(User2::class, 'user_2_id', 'id_user');
    }
}