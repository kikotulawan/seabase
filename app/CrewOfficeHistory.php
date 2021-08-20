<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrewOfficeHistory extends Model
{
    protected $guarded=[];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
