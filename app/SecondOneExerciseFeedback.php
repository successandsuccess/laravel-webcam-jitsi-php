<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondOneExerciseFeedback extends Model
{
    protected $table = "secondoneexercisefeedbacks";

    protected $fillable = [
        'feeling',
        'user_id',
        'order',
        'patientactivity_id'
    ];

    public function getUser() 
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getPatientActivity()
    {
        return $this->belongsTo('App\PatientActivity', 'patientactivity_id', 'id');
    }

}
