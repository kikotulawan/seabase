<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrewRank extends Model
{
    protected $guarded  =[];

    public function crew()
    {
        return $this->belongsTo(Crew::class,'crew_id','id');
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class,'rank_id','id');
    }
}
