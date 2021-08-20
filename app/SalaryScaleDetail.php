<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryScaleDetail extends Model
{
    protected $fillable=[
        'salary_scale_id',
        'rank_id',
        'description',
        'monthly',
        'daily',
        'percentage',
        'days',
        'remarks',
        'add_to_total',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function salaryscale()
    {
        return $this->belongsTo(SalaryScale::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }

    public function vesselsalaryscale()
    {
        return $this->hasMany(VesselSalaryScale::class);
    }
}
