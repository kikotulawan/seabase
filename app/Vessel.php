<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected $guarded=[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function principal()
    {
        return $this->belongsTo(Principal::class);
    }

    public function vesseltype()
    {
        return $this->belongsTo(VesselType::class,'vessel_type_id','id');
    }
    public function flagstatedocument()
    {
        return $this->belongsTo(FlagStateDocument::class,'flag_id','id');
    }


    public function traderoute()
    {
        return $this->belongsTo(TradeRoute::class, 'trade_route_id', 'id');
    }

    public function crewincident()
    {
        return $this->hasMany(CrewIncident::class);
    }
}
