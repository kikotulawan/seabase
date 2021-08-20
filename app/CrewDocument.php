<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class CrewDocument extends Model
{
    protected $fillable=[
        'crew_id',
        'document_id',
        'document_number',
        'issue_date',
        'expiry_date',
        'issued_by',
        'place_issued',
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

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
