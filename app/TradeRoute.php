<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TradeRoute extends Model
{
    protected $table='trade_routes';
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function vessel()
    {
        return $this->hasMany(Vessel::class);
    }
}
