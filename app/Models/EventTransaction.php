<?php

namespace App\Models;

use App\Models\User;
use App\Models\Event;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'ref_transaction_event',
        'payment_method',
        'total_payment',
        'fee_transaction',
        'date_order',
        'status'
    ];

    protected $guarded = [
        'id'
    ];


    public function user () {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function event () {
        return $this->belongsTo(Event::class, 'event_id');
    }
}
