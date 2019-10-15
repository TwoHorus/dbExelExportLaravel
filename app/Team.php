<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{

    protected $table = 'team';

    protected $fillable = [
        'name',
    ];
    protected $nullable = [
        'created_at',
        'updated_at',
    ];
}
