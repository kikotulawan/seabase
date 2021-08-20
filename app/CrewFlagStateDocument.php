<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CrewFlagStateDocument extends Model
{
    protected $fillable=[
        'crew_id',
        'flag_id',
        'license_type_id',
        'document_number',
        'issue_date',
        'expiry_date',
        'issued_by',
        'remarks',
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

    public function license()
    {
        return $this->belongsTo(License::class,'license_type_id','id');
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }

    public function flagstatedocument()
    {
        return $this->belongsTo(FlagStateDocument::class, 'flag_id', 'id');
    }
}
