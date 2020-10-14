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
    ];

    public function getUser() 
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
