<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $guarded=[];
    public function rank(){
        return $this->belongsTo(Rank::class, 'department_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
