<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FirstFeedback extends Model
{
    protected $table = 'firstfeedbacks';

    protected $fillable = [
        'todaypain',
        'totalpain',
        'lastpain',
        'meeting_id',
    ];

    public function getUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

}
