<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MedicalCertificate extends Model
{
    protected $table='medical_certificates';
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crewmedical()
    {
        return $this->hasMany(CrewMedical::class);
    }
}
