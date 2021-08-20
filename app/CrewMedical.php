<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrewMedical extends Model
{
    protected $fillable=[
        'crew_id',
        'medical_certificate_id',
        'clinic_id',
        'certificate_number',
        'issue_date',
        'expiry_date',
        'remarks',
        'file_path',
        'user_id'
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

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function medicalcertificate()
    {
        return $this->belongsTo(MedicalCertificate::class,'medical_certificate_id','id');
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
