<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    protected $table='reviews';
    protected $fillable = [
        'email',
        'name',
        'completable',
        'completable_other',
        'difficult_answer',
        'qeeue',
        'qeeueb',
        'qeeuec',
        'exerciser',
    ];
}
