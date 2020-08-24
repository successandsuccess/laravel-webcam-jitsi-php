<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meetings extends Model
{
    protected $table="meetings";

    protected $fillable = [
        'time',
        'provider',
        'meetUrl',
        'userId',
    ];

    protected $casts = [
        'time' => 'datetime',
    ];

    public function userRelation()
    {
        return $this->belongsTo("App\User", 'userId', 'id');
    }
}
