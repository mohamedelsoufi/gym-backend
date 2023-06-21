<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayGymClass extends Model
{
    protected $table = 'day_gym_classes';

    public $timestamps = false;

    protected $guarded = [];

    // relation start
    public function day()
    {
        return $this->belongsTo(Day::class);
    }

    public function gymClass()
    {
        return $this->belongsTo(GymClass::class);
    }
    // relation end
}
