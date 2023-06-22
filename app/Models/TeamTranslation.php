<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamTranslation extends Model
{
    use HasFactory;

    protected $table = 'team_translations';

    public $timestamps = false;

    protected $guarded = [];

    // accessors & Mutator start
    public function getNameAttribute($val)
    {
        return $this->attributes['name'] = ucwords($val);
    }

    public function getJobTitleAttribute($val)
    {
        return $this->attributes['job_title'] = ucwords($val);
    }
    // accessors & Mutator end
}
