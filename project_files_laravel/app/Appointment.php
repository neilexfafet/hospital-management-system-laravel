<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = [
        'date', 'time', 'doctor_id', 'patient_id','fee', 'status',
    ];

    public function patients() {
    	return $this->belongsToMany(Patient::class, 'patient_id');
    }

//    public function doctors() {
//    	return $this->belongsToMany(Doctor::class, 'doctor_id');
//    }

}
