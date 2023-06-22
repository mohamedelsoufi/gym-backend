<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $guarded = [];

    public $timestamps = true;

    // relations start
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
    // relations end

    // accessors & Mutator start
    public function setNameAttribute($val)
    {
        $this->attributes['name'] = ucwords($val);
    }

    public function setCommentAttribute($val)
    {
        $this->attributes['comment'] = ucfirst($val);
    }
    // accessors & Mutator end
}
