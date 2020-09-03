<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Screenshot extends Model
{
    protected $table="screenshots";

    protected $fillable = [
        'url',
        'uuid',
    ];
}
