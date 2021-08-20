<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function crewvaccine()
    {
        return $this->hasMany(CrewVaccine::class);
    }
}
