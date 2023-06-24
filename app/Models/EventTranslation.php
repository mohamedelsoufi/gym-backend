<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventTranslation extends Model
{
    use HasFactory;

    protected $table = 'event_translations';

    public $timestamps = false;

    protected $guarded = [];

    // accessors & Mutator start
    public function getTitleAttribute($val)
    {
        return $this->attributes['title'] = ucwords($val);
    }

    public function getDescriptionAttribute($val)
    {
        return $this->attributes['description'] = ucfirst($val);
    }
    // accessors & Mutator end
}
