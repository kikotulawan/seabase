<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmbarkationDetail extends Model
{
    protected $fillable=['crew_id','embarkation_id','rank_id'];

    public function embarkation()
    {
        return $this->belongsTo(Embarkation::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
