<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CrewChildrenBenificiary extends Model
{
    protected $guarded=[];
    protected $dates = ['birth_date'];


    public function setBirthDateValue($value) {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
