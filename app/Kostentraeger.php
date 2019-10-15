<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kostentraeger extends Model
{
    protected $table = 'kostentraeger';

    protected function project()
    {
        return $this->hasMany('App\Project', 'ktid', 'id'); //See Above
    }

    protected $fillable =[
        'name',
    'nummer',
    'budget',

    ];
}
