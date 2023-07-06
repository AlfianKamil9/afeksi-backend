<?php

namespace App\Models;

use App\Models\EventCategory;
use App\Models\EventTransaction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

     protected $fillable = [
        'category_event_id',
        'title_event',
        'slug_event',
        'time_category_event',
        'pay_category_event',
        'registration_start',
        'registration_end',
        'date_event',
        'time_start',
        'time_finish',
        'cover_event',
        'price_event',
        'description_event',
        'status_event'
    ];

    public function sluggable()
    {
        return [
            'slug_event' => [
                'source' => 'title_event'
            ]
        ];
    }
    protected $guarded = [
        'id'
    ];

    protected $table = 'events';
    
    // protected $with = ['event_categories'];

    public function event_categories () {
        return $this->belongsTo(EventCategory::class, 'category_event_id');
    }

    public function event_transaction () {
        return $this->hasMany(EventTransaction::class);
    }
}
