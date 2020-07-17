<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medhistory extends Model
{
    protected $fillable = [
        'bp', 'weight', 'height', 'bloodsugar', 'cbc', 'bodytemp', 'medprescription', 'comments', 'patient_id',
    ];
}
