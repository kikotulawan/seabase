<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlagStateDocument extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crewflagstatedocument()
    {
        return $this->hasMany(CrewFlagStateDocument::class);
    }

    public function vessel()
    {
        return $this->hasMany(Vessel::class);
    }
}
