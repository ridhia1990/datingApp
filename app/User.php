<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password','dobirth','gender','latitude','longitude','photo'
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
}
