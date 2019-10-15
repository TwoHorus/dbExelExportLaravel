<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    public function worker()
    {
        return $this->belongsTo('App\Worker', 'isworkerid');
    }

   /* protected function isworkerid()
    {
        return $this->hasOne('App\Worker');
    }
    THIS IS ACTUALLY IN REVERSE AND THE SPECIFICATION IS
    return $this->hasOne('App\Phone', 'foreign_key', 'local_key');


    */

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];




    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
