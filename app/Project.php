<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{

    protected $table = 'projects';

    public function type()
    {
        return $this->belongsTo('App\Projecttype', 'projecttypeid');
    }
    protected function qes()
    {
        return $this->hasMany('App\Qes', 'projectid', 'id'); //See Above
    }
    protected function kostentraeger()
    {
        return $this->belongsTo('App\Kostentraeger', 'ktid');
    }
    //ktid
    protected $fillable =[
        'name',
        'shortdescription'
    ];
}
