<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrainingCourse extends Model
{
    protected $table='training_courses';
    protected $guarded=[];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function crewtraining()
    {
        return $this->hasMany(CrewTraining::class);
    }
}
