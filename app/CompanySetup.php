<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanySetup extends Model
{
    protected $guarded=[];

    public function agency()
    {
        return $this->belongsTo(Agency::class,);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }




}
