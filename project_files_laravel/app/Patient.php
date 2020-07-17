<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Patient extends Authenticatable
{
    use Notifiable;

    protected $guard = 'patient';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'birthday', 'gender', 'address', 'contactno', 'status',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function appointments() {
//    	return $this->belongsToMany(Appointment::class, 'patient_id');
//    }
}
