<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crewmedical()
    {
        return $this->hasMany(CrewMedical::class);
    }
}
