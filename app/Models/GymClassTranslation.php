<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymClassTranslation extends Model
{
    use HasFactory;

    protected $table = 'gym_class_translations';

    public $timestamps = false;

    protected $guarded = [];

    // accessors & Mutator start
    public function getTitleAttribute($val)
    {
        return $this->attributes['title'] = ucwords($val);
    }
    // accessors & Mutator end
}
