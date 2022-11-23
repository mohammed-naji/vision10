<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Mockery\Matcher\Subset;

class Student extends Model
{
    use HasFactory;

    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }
}


// hasOne => one to one => main to second
// hasMany => one to many => main to second
// belongsTo => one to one, one to many => second to main
// belongsToMany => many to many => both side
