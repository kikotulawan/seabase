<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrewAllottee extends Model
{
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
