<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Embarkation extends Model
{
    protected $fillable=[
        'code',
        'vessel_id',
        'departure_id',
        'departure_date',
        'embarkation_id',
        'embarkation_date',
        'arrival_id',
        'arrival_date',
        'disembarkation_id',
        'disembarkation_date',
        'contract_duration',
        'point_of_hire',
        'remarks',
        'status_id',
        'products'
    ];

    protected $dates = ['embarkation_date','departure_date','disembarkation_date','arrival_date'];

    public function departureplace()
    {
        return $this->belongsTo(Airport::class,'departure_id','id');
    }

    public function embarkationplace()
    {
        return $this->belongsTo(Seaport::class,'embarkation_id','id');
    }

    public function disembarkationplace()
    {
        return $this->belongsTo(Seaport::class,'disembarkation_id','id');
    }
    public function status()
    {
        return $this->belongsTo(Status::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function vessel()
    {
        return $this->belongsTo(Vessel::class);
    }
    public function embarkationdetail()
    {
        return $this->hasMany(EmbarkationDetail::class);
    }


    public function setDepartureDateValue($value) {
        $this->attributes['departure_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setEmbarkationDateValue($value) {
        $this->attributes['embarkation_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setDisembarkationDateValue($value) {
        $this->attributes['disembarkation_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
}
