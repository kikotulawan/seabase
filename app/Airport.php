<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable=['code','airport','country_id'];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }
}
