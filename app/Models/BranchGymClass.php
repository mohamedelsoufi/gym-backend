<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchGymClass extends Model
{
    protected $table = 'branch_gym_classes';

    public $timestamps = false;

    protected $guarded = [];

    // relation start
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function gymClass()
    {
        return $this->belongsTo(GymClass::class);
    }
    // relation end
}
