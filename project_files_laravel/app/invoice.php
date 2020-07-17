<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
    protected $fillable = [
        'invoice', 'handler', 'patient_id', 'total',  
    ];
}
