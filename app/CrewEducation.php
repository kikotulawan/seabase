<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CrewEducation extends Model
{
    protected $guarded=[];
    protected $dates = ['attendance_date'];


    public function setAttendanceDateValue($value) {
        $this->attributes['attendance_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
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
