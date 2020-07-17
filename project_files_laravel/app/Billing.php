<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Billing extends Authenticatable
{
    use Notifiable;

    protected $guard = 'billing';

    protected $fillable = [
        'username', 'password', 'handler',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}
