<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contractmodel extends Model
{
    
    protected $table = 'contractmodel';

    protected function qes()
    {
        return $this->hasMany('App\Qes', 'contractmodelid', 'id'); //oder hasMany
        // DIE EXPLIZITE REGELUNG BESAGT: in der TABELLE Contractmodel(s) LIEGT EIN FREMDSCHLÜSSEL ID VOR.
        // DIESER FREMDSCHLÜSSEL ZEIGT AUF 'contractmodelid' in der tabelle des Modells Qes.
    }
    public function worker()
    {
        return $this->hasMany('App\Worker', 'contractmodelid', 'id');
    }

    protected $fillable =[
        'name',
        'manhoursinamonth',
        'manmonthsinaquarter',
        'timescale',
    ];
}
