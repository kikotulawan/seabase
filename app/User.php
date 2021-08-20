<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasRoles;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','company_id','position','signatory'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function agent()
    {
        return $this->hasMany(Agent::class);
    }

    public function airline()
    {
        return $this->hasMany(Airline::class);
    }

    public function bank()
    {
        return $this->hasMany(Bank::class);
    }

    public function branch()
    {
        return $this->hasMany(Branch::class);
    }

    public function clinic()
    {
        return $this->hasMany(Clinic::class);
    }
    public function department()
    {
        return $this->hasMany(Department::class);
    }

    public function document()
    {
        return $this->hasMany(Document::class);
    }

    public function flagstatedocument()
    {
        return $this->hasMany(FlagStateDocument::class);
    }

    public function license()
    {
        return $this->hasMany(License::class);
    }

    public function agency()
    {
        return $this->hasMany(Agency::class);
    }

    public function medical_certificate()
    {
        return $this->hasMany(MedicalCertificate::class);
    }

    public function rank()
    {
        return $this->hasMany(Rank::class);
    }

    public function trade_route()
    {
        return $this->hasMany(TradeRoute::class);
    }

    public function training_course()
    {
        return $this->hasMany(TrainingCourse::class);
    }
    public function training_center()
    {
        return $this->hasMany(TrainingCenter::class);
    }

    public function vaccine()
    {
        return $this->hasMany(Vaccine::class);
    }

    public function vessel_type()
    {
        return $this->hasMany(VesselType::class);
    }

    public function crew()
    {
        return $this->hasMany(Crew::class);
    }

    public function status()
    {
        return $this->hasMany(Status::class);
    }

    public function principal()
    {
        return $this->hasMany(Principal::class);
    }

    public function education()
    {
        return $this->hasMany(CrewEducation::class);
    }

    public function airport()
    {
        return $this->hasMany(Airport::class);
    }

    public function seaport()
    {
        return $this->hasMany(Seaport::class);
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

    public function salaryscale()
    {
        return $this->hasMany(SalaryScale::class);
    }

    public function salaryscaledetail()
    {
        return $this->hasMany(SalaryScaleDetail::class);
    }

    public function vessel()
    {
        return $this->hasMany(Vessel::class);
    }

    public function principalcontact()
    {
        return $this->hasMany(PrincipalContact::class);
    }

    public function embarkation()
    {
        return $this->hasMany(Embarkation::class);
    }

    public function companysetup()
    {
        return $this->belongsTo(CompanySetup::class);
    }

    public function crewchildrenbenificiary()
    {
        return $this->hasMany(CrewChildrenBenificiary::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function signatory()
    {
        return $this->hasMany(Signatory::class);
    }

    public function announcement()
    {
        return $this->hasMany(Announcement::class);
    }
}
