<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accepted extends Model
{
    protected $table = 'accepted';

    public function worker()
    {
        return $this->belongsTo('App\Worker', 'workerid');
    }

    protected $fillable =[
        'time',
        'teamid'
    ];
}
