<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rabbit extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'code',
        'name',
        'gender',
        'status',
        'breed',
        'birth_date',
        'weight',
        'health_status',
        'notes'
    ];

    protected $casts = [
        'birth_date' => 'date',
        'weight' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function healthRecords()
    {
        return $this->hasMany(HealthRecord::class);
    }

    public function feedingSchedules()
    {
        return $this->hasMany(FeedingSchedule::class);
    }

    public function getAgeAttribute()
    {
        return $this->birth_date->diffInMonths(now());
    }
}
