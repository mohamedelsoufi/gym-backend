<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DayTranslation extends Model
{
    use HasFactory;

    protected $table = 'day_translations';

    public $timestamps = false;

    protected $guarded = [];

    // accessors & Mutator start
    public function getTitleAttribute($val)
    {
        return $this->attributes['day'] = ucwords($val);
    }
    // accessors & Mutator end
}
