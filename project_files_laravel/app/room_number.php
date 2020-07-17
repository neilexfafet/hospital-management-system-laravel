<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room_number extends Model
{
    protected $fillable = [
        'room_type', 'room_number', 'status', 
    ];
}
