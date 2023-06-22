<?php

namespace App\Models;

use App\Traits\Files\HasFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassSchedule extends Model
{
    use HasFactory, HasFile;

    protected $table = 'class_schedules';

    protected $guarded = [];

    protected $appends = ['image','cover'];

    public $timestamps = true;

    // Scopes start
    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    // Scopes end

    // accessors & Mutator start
    public function getImageAttribute()
    {
        $image = $this->file()->where('type','image')->first();
        return $image ? $image->path : asset('uploads/default_image.png');
    }

    public function getCoverAttribute()
    {
        $image = $this->file()->where('type','cover')->first();
        return $image ? $image->path : asset('uploads/default_image.png');
    }

    public function getActive()
    {
        return $this->status == 1 ? __('words.active') : __('words.inactive');
    }
    // accessors & Mutator end
}
