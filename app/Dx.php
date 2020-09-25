<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dx extends Model
{
    protected $table = 'dxs';
    protected $primaryKey = 'dx_id';

    protected $fillable = [
        'dx_name',
        'dx_desc',
    ];

    
}
