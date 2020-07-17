<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    public $timestamps=true;

    protected $fillable = [
        'patient_id', 'handler', 'amount', 'status', 'payment', 
    ];
}
