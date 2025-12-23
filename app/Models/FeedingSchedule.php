<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedingSchedule extends Model
{
    protected $fillable = [
        'user_id',
        'rabbit_id',
        'feeding_date',
        'feeding_time',
        'feed_type',
        'quantity',
        'status',
        'notes'
    ];

    protected $casts = [
        'feeding_date' => 'date',
        'quantity' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rabbit()
    {
        return $this->belongsTo(Rabbit::class);
    }
}
