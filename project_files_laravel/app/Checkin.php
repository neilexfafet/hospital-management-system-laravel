<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    public $timestamps=true;

    protected $fillable = [
        'roomno', 'roomtype', 'fee', 'status', 'patient_id', 'doctor_id', 
    ];
}
