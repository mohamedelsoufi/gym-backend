<?php

namespace App\Models;

use App\Traits\Files\HasFile;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, Translatable;


    protected $table = 'events';

    protected $guarded = [];

    public $translatedAttributes = ['title', 'description'];

    public $timestamps = true;


    // relations start
    public function subscribers()
    {
        return $this->hasMany(EventSubscriber::class);
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
