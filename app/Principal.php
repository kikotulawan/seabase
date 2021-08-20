<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Principal extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function salaryscale()
    {
        return $this->hasMany(SalaryScale::class);
    }

    public function vessel()
    {
        return $this->hasMany(Vessel::class);
    }

    public function principalcontact()
    {
        return $this->hasMany(PrincipalContact::class);
    }
}
