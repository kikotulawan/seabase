<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class License extends Model
{
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function crewlicense()
    {
        return $this->hasMany(CrewLicense::class);
    }

    public function crewflagstatedocument()
    {
        return $this->hasMany(CrewFlagStateDocument::class);
    }
}
