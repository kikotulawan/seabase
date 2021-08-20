<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CrewDocumentLibrary extends Model
{
    protected $fillable=[
        'crew_id',
        'user_id',
        'document_name',
        'file_path',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
