<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Laboratory extends Authenticatable
{
    use Notifiable;

    protected $guard = 'laboratory';

    protected $fillable = [
        'name', 'username', 'password', 'handler',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
