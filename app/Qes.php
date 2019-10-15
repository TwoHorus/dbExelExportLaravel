<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qes extends Model
{
    
    protected $table = 'qes';
    public function worker()
    {
        return $this->belongsTo('App\Worker', 'workerid');
    }
    public function project()
    {
        return $this->belongsTo('App\Project', 'projectid');
    }

    public function contractmodel()
    {
        return $this->belongsTo('App\Contractmodel', 'contractmodelid');
    }
    public function quarter()
    {
        return $this->belongsTo('App\Quarter', 'quarterid');
    }
    protected $fillable =[
        'confirmedstate',
        'desiredstate',
        'actualstate',
    ];

    //quarter
    //confirmedstate
    //desiredstate
    //actualstate
    //projectid
}
