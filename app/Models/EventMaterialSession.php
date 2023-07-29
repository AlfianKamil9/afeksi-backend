<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventMaterialSession extends Model
{
    use HasFactory;
    public $pembicara;

    public function __construct()
    {
        
    }

    protected $fillable = [
        "title_sesi",
        "event_id",
        "pembicara_id",
    ];

    public function event() {
        return $this->belongsTo(Event::class);
    }

    public function pembicara () {
        return $this->belongsTo(Psikolog::class);
    } 
}
