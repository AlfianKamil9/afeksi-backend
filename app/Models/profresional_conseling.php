<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profresional_conseling extends Model
{
    use HasFactory;

    protected $table = "profresional_conseling";
    protected $fillable = ["namaPengalaman"];
}

