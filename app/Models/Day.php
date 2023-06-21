<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory, Translatable;


    protected $table = 'days';

    protected $guarded = [];

    public $translatedAttributes = ['day'];

    public $timestamps = true;

    // relations start
    public function gymClass()
    {
        return $this->belongsToMany(GymClass::class, DayGymClass::class);
    }
    // relations end

    // Scopes start
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    // Scopes end

    // accessors & Mutator start
    public function getActive()
    {
        return $this->status == 1 ? __('words.active') : __('words.inactive');
    }
    // accessors & Mutator end
}
