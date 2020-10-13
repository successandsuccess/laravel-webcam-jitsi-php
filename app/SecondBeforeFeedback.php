<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondBeforeFeedback extends Model
{
    protected $table = 'secondbeforefeedbacks';

    protected $fillable = [
        'user_id',
        'todaypain',
        'newaccident',
        'newinjury',
    ];

    public function getUser() 
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
