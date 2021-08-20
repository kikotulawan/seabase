<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrewLicense extends Model
{
    protected $fillable=[
        'crew_id',
        'license_number',
        'license_id',
        'issue_date',
        'expiry_date',
        'issued_by',
        'remarks',
        'file_path',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function license()
    {
        return $this->belongsTo(License::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
