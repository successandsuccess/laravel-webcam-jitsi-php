<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondTotalExerciseFeedback extends Model
{
    protected $table = "secondtotalexercisefeedbacks";
    protected $fillable = [
        'todaypain',
        'completable',
        'difficult_level',
        'user_id'
    ];

    public function getUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
