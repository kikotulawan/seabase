<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CrewTraining extends Model
{
    protected $fillable=[
        'crew_id',
        'training_course_id',
        'training_center_id',
        'certificate_number',
        'stcw_code',
        'issue_date',
        'expiry_date',
        'issued_by',
        'place_issued',
        'mlc',
        'file_path',
        'user_id',
    ];
    protected $dates = ['issue_date','expiry_date'];

    public function setIssueDateValue($value) {
        $this->attributes['issue_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setExpiryDateValue($value) {
        $this->attributes['expiry_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function trainingcenter()
    {
        return $this->belongsTo(TrainingCenter::class,'training_center_id','id');
    }

    public function trainingcourse()
    {
        return $this->belongsTo(TrainingCourse::class,'training_course_id','id');
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
