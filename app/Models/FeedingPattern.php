<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeedingPattern extends Model
{
    protected $fillable = [
        'user_id',
        'pattern_name',
        'rabbit_category',
        'daily_schedule',
        'is_active',
        'notes'
    ];

    protected $casts = [
        'daily_schedule' => 'array',
        'is_active' => 'boolean'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
