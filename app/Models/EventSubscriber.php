<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventSubscriber extends Model
{
    use HasFactory;

    protected $table = 'event_subscribers';

    protected $guarded = [];

    public $timestamps = true;

    // relations start
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
    // relations end

    // accessors & Mutator start
    public function setNameAttribute($val)
    {
        $this->attributes['name'] = ucwords($val);
    }
    // accessors & Mutator end
}
