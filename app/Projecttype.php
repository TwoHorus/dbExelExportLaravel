<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projecttype extends Model
{
    
    protected $table = 'projecttype';

    protected function project()
    {
        return $this->hasMany('App\Project', 'projecttypeid', 'id'); //See Above
    }

    protected $fillable =[
        'name',
    ];
}
