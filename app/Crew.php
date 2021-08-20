<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Crew extends Authenticatable
{
    use Notifiable;
    protected $guard = 'portal';
    protected $dates = ['application_date','birth_date','kin_birth_date','psu_issuance_date','nbi_validity','spouse_birth_date','spouse_married_date'];
    protected $fillable=[
        'image_path',
        'application_date',
        'crew_no',
        'first_name',
        'middle_name',
        'last_name',
        'contact_address',
        'email',
        'telephone',
        'no_bldg',
        'street_barangay',
        'municipality_city',
        'province',
        'zip_code',
        'mobile_no',
        'country_id',
        'birth_date',
        'birth_place',
        'gender',
        'civil_status',
        'height',
        'weight',
        'blood_type',
        'eye_color',
        'civil_status',
        'religion',
        'nationality',
        'foreign_language',
        'race',
        'kin_fullname',
        'kin_birth_date',
        'kin_relationship',
        'kin_address',
        'kin_telephone',
        'kin_hp_no',
        'cover_all',
        'safety_shoes',
        'white_polo',
        'black_pants',
        'winter_jacket',
        'winter_pants',
        'rain_coat',
        'sss_no',
        'philhealth_no',
        'pagibigid_no',
        'psu_no',
        'psu_issuance_date',
        'nbi_no',
        'nbi_validity',
        'member_type',
        'remarks',
        'recommended_by',
        'other_info',
        'password',
        'fathers_name',
        'fathers_occupation',
        'fathers_address',
        'mothers_name',
        'mothers_occupation',
        'mothers_address',
        'spouse_first_name',
        'spouse_last_name',
        'spouse_middle_name',
        'spouse_married_date',
        'spouse_birth_date',
        'spouse_birth_place',
        'spouse_occupation',


    ];


    // public function getApplicationDateValue() {
    //     return $this->attributes['application_date']->format('d-m-Y');
    // }

    public function setApplicationDateValue($value) {
        $this->attributes['application_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setBirthDateValue($value) {
        $this->attributes['birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setKinBirthDateValue($value) {
        $this->attributes['kin_birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }

    public function setSpouseMarriedDateValue($value) {
        $this->attributes['spouse_married_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function setSpouseBirthDateValue($value) {
        $this->attributes['spouse_birth_date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function creweducation()
    {
        return $this->hasMany(CrewEducation::class);
    }

    public function crewrank()
    {
        return $this->hasMany(CrewRank::class);
    }

    public function crewstatus()
    {
        return $this->hasMany(CrewStatus::class);
    }

    public function crewlicense()
    {
        return $this->hasMany(CrewLicense::class);
    }

    public function crewflagstatedocument()
    {
        return $this->hasMany(CrewFlagStateDocument::class);
    }

    public function crewdocument()
    {
        return $this->hasMany(CrewDocument::class);
    }
    public function crewtraining()
    {
        return $this->hasMany(CrewTraining::class);
    }

    public function crewdocumentlibrary()
    {
        return $this->hasMany(CrewDocumentLibrary::class);
    }

    public function crewmedical()
    {
        return $this->hasMany(CrewMedical::class);
    }

    public function crewvaccine()
    {
        return $this->hasMany(CrewVaccine::class);
    }
    public function crewallottee()
    {
        return $this->hasMany(CrewAllottee::class);
    }

    public function crewofficehistory()
    {
        return $this->hasMany(CrewOfficeHistory::class);
    }

    public function principal()
    {
        return $this->hasMany(Principal::class);
    }
    public function crewchildrenbenificiary()
    {
        return $this->hasMany(CrewChildrenBenificiary::class);
    }

    public function embarkationdetail()
    {
        return $this->hasMany(EmbarkationDetail::class);
    }
    // public function rank()
    // {
    //     return $this->belongsTo(Rank::class);
    // }

    // public function status()
    // {
    //     return $this->belongsTo(Status::class);
    // }
}
