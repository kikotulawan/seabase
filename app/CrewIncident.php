<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CrewIncident extends Model
{
    protected $guarded=[];

    protected $dates = ['incident_date','repatriation_date','pronounced_date','settled_date'];

    public function setIncidentDateValue($value) {
        $this->attributes['incident_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setRepatriationDateValue($value) {
        $this->attributes['repatriation_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setPronouncedDateValue($value) {
        $this->attributes['pronounced_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setSettledDateValue($value) {
        $this->attributes['settled_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function vessel()
    {
        return $this->belongsTo(Vessel::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class,'incident_rank_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class,'incident_clinic_id','id');
    }
}
