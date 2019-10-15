<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quarter extends Model
{
    protected $table = 'quarter';
    protected function qes()
    {
        return $this->hasMany('App\Qes', 'quarterid', 'id'); 
    }
    protected $fillable =[
        'year',
        'quarterenddate',
        'q',
        'confirmedstate'
    ];
}
