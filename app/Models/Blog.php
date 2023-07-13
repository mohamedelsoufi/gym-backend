<?php

namespace App\Models;

use App\Traits\Files\HasFile;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, Translatable, HasFile;

    protected $table = 'blogs';

    protected $guarded = [];

    protected $appends = ['image'];

    public $translatedAttributes = ['title', 'description'];

    public $timestamps = true;

    // relations start
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    // relations end

    // Scopes start
    public function scopeSearch($query)
    {

        $query->when(request()->id, function ($q) {
            return $q->where('id', request()->id);
        });
    }

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
