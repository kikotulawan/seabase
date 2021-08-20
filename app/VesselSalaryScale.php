<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VesselSalaryScale extends Model
{
    protected $fillable=[
        'vessel_id',
        'salary_scale_detail_id',
        'rank_id',
        'description',
        'monthly',
        'daily',
        'percentage',
        'days',
        'remarks',
        'add_to_total',
    ];

    public function salaryscaledetail()
    {
        return $this->belongsTo(SalaryScaleDetail::class);
    }

    public function rank()
    {
        return $this->belongsTo(Rank::class);
    }
}
