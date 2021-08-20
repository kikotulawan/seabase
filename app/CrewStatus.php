<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrewStatus extends Model
{
    protected $guarded=[];

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
}
