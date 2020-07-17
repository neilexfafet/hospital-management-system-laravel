<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labtest extends Model
{
    protected $fillable = [
        'request', 'testresult', 'status', 'patient_id', 'doctor_id', 'lab_id',
    ];
}
