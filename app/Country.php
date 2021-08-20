<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $primarykey='id';
    protected $fillable=['code','country'];

    public function user()
    {
        return $this->belongsTo(Airport::class, 'country_id', 'id');
    }

    public function principal()
    {
        return $this->hasMany(Principal::class);
    }

    public function airport()
    {
        return $this->hasMany(Airport::class);
    }
}
