<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrewSalaryScale extends Model
{
    protected $guarded=[];

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
}
