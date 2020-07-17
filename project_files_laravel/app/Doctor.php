<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Doctor extends Authenticatable
{
    use Notifiable;

    protected $guard = 'doctor';

    protected $fillable = [
        'first_name', 'last_name', 'specialization', 'email', 'password', 'birthday', 'gender', 'address', 'contactno', 'biography', 'status', 'fee',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

//    public function appointments() {
//    	return $this->belongsToMany(Appointment::class, 'doctor_id');
//    }
}
