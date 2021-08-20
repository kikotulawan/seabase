<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $fillable=['rank','code','department_id'];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salaryscaledetail()
    {
        return $this->hasMany(SalaryScaleDetail::class);
    }

    public function vesselsalaryscaledetail()
    {
        return $this->hasMany(VesselSalaryScale::class);
    }

    /**
     * Get all of the comments for the Rank
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function crewsalaryscale()
    {
        return $this->hasMany(CrewSalaryScale::class);
    }
    // public function crew()
    // {
    //     return $this->hasMany(Crew::class);
    // }

    public function crewincident()
    {
        return $this->hasMany(CrewIncident::class);
    }
}
