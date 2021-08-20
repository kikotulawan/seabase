<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CrewVaccine extends Model
{
    protected $fillable=[
        'crew_id',
        'vaccine_id',
        'immunization_date',
        'expiry_date',
        'file_path',
        'user_id'
    ];
    protected $dates = ['immunization_date','expiry_date'];

    public function setImmunizationDateValue($value) {
        $this->attributes['immunization_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setExpiryDateValue($value) {
        $this->attributes['expiry_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
