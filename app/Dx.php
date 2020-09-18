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
        'rx_1',
        'rx_2',
        'rx_3',
        'rx_4',
        'rx_5'
    ];

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
