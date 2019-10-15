<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $table = 'worker';

    protected function user()
    {
        return $this->hasOne('App\User', 'isworkerid', 'id'); //oder hasMany
        // DIE EXPLIZITE REGELUNG BESAGT: in der TABELLE WORKER(s) LIEGT EIN FREMDSCHLÜSSEL ID VOR.
        // DIESER FREMDSCHLÜSSEL ZEIGT AUF 'isworkerid' in der tabelle des Modells User.
    }
    protected function qes()
    {
        return $this->hasMany('App\Qes', 'workerid', 'id'); //See Above
    }
    public function contractmodel()
    {
        return $this->belongsTo('App\Contractmodel', 'contractmodelid');
    }
    public function team()
    {
        return $this->belongsTo('App\Team', 'teamid');
    }


   
    protected $fillable =[
        'lastname',
        'firstname',
        'email',
    ];
}
