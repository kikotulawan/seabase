<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrincipalContact extends Model
{
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function principal()
    {
        return $this->belongsTo(Principal::class);
    }
}
