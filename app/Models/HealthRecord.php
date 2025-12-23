<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HealthRecord extends Model
{
    protected $fillable = [
        'user_id',
        'rabbit_id',
        'check_date',
        'diagnosis',
        'symptoms',
        'treatment',
        'medicine',
        'next_check_date',
        'status',
        'notes'
    ];

    protected $casts = [
        'check_date' => 'date',
        'next_check_date' => 'date'
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
