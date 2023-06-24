<?php

namespace App\Models;

use App\Traits\Files\HasFile;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory, Translatable, HasFile;


    protected $table = 'events';

    protected $guarded = [];

    public $translatedAttributes = ['title', 'description'];

    public $appends = ['image'];

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
    public function getImageAttribute()
    {
        $image = $this->file()->first();
        return $image ? $image->path : asset('uploads/default_image.png');
    }

    public function getActive()
    {
        return $this->status == 1 ? __('words.active') : __('words.inactive');
    }
    // accessors & Mutator end
}
