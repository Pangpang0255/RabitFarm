<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BreedingSchedule extends Model
{
    protected $fillable = [
        'user_id',
        'female_rabbit_id',
        'male_rabbit_id',
        'breeding_date',
        'expected_birth_date',
        'status',
        'offspring_count',
        'notes'
    ];

    protected $casts = [
        'breeding_date' => 'date',
        'expected_birth_date' => 'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function femaleRabbit()
    {
        return $this->belongsTo(Rabbit::class, 'female_rabbit_id');
    }

    public function maleRabbit()
    {
        return $this->belongsTo(Rabbit::class, 'male_rabbit_id');
    }
}
