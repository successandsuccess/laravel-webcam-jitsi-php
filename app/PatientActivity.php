<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PatientActivity extends Model
{
    protected $table = "patient_activities";
    protected $primaryKey = "id";

    protected $casts = [
        'appoint_time' => 'datetime',
    ];

    protected $fillable = [
        'appoint_time',
        'length',
        'type',
        'completion',
        'user_id',
        'provider_id',
    ];

    public function getUser()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function getProvider()
    {
        return $this->belongsTo('App\Admin', 'provider_id', 'id');
    }
}
