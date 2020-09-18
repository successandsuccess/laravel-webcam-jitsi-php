<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rx extends Model
{
    protected $table = "rxs";
    protected $primaryKey = "rx_id";

    protected $fillable = [
        'rx_name',
        'rx_link',
        'rx_note',
        'dx_no',
        'type'
    ];

    
}
