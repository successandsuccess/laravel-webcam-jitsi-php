<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VideoUploads extends Model
{
    protected $table="videouploads";

    protected $fillable = [
        'videoUrl',
        'userId',
        'duration'
    ];

    public function userRelation()
    {
        return $this->belongsTo("App\User", 'userId', 'id');
    }
}
