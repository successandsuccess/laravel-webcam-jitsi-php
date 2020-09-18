<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Admin extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'admin';

        protected $fillable = [
            'name', 
            'email', 
            'password',
            'phone',
            'street',
            'city',
            'zip',
            'l_name',
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];


        public function forPatients()
        {
            return $this->hasMany('App\User');
        }
    }