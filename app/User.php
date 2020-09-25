<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
  
    protected $fillable = [
        'name', 
        'email', 
        'password', 
        'lname', 
        'street', 
        'no', 
        'city', 
        'zip', 
        'phone', 
        'insurance_carrier',
        'insurance_phone',
        'group',
        'policy_id',
        'gender',
        'prov_id_1',
        'prov_id_2',
        'prov_id_3',
        'dx_1',
        'dx_2',
        'dx_3',
        'dx_4',
        'dx_5'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getProvider1()
    {
        return $this->belongsTo('App\Admin','prov_id_1' ,'id');
    }

    public function getProvider2()
    {
        return $this->belongsTo('App\Admin','prov_id_2', 'id');
    }

    public function getProvider3()
    {
        return $this->belongsTo('App\Admin','prov_id_3', 'id');
    }

    public function getDx1()
    {
        return $this->belongsTo('App\Dx', 'dx_1', 'dx_id');
    }

    public function getDx2()
    {
        return $this->belongsTo('App\Dx', 'dx_2', 'dx_id');
    }

    public function getDx3()
    {
        return $this->belongsTo('App\Dx', 'dx_3', 'dx_id');
    }

    public function getDx4()
    {
        return $this->belongsTo('App\Dx', 'dx_4', 'dx_id');
    }

    public function getDx5()
    {
        return $this->belongsTo('App\Dx', 'dx_5', 'dx_id');
    }

    public function getRx1()
    {
        return $this->belongsTo('App\Rx', 'rx_1', 'rx_id');
    }

    public function getRx2()
    {
        return $this->belongsTo('App\Rx', 'rx_2', 'rx_id');
    }

    public function getRx3()
    {
        return $this->belongsTo('App\Rx', 'rx_3', 'rx_id');
    }

    public function getRx4()
    {
        return $this->belongsTo('App\Rx', 'rx_4', 'rx_id');
    }

    public function getRx5()
    {
        return $this->belongsTo('App\Rx', 'rx_5', 'rx_id');
    }
}
