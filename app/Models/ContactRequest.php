<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactRequest extends Model
{
    use HasFactory;

    protected $table = 'contact_requests';

    protected $guarded = [];

    public $timestamps = true;


    // accessors & Mutator start
    public function getNameAttribute($val)
    {
        return $this->attributes['name'] = ucwords($val);
    }

    public function getSubjectAttribute($val)
    {
        return $this->attributes['subject'] = ucwords($val);
    }
    // accessors & Mutator end

}
