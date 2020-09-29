<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $fillable = [
        'name',
        'city_id',
        'latitude',
        'longitude',
        'address',
        'number',
        'zip_code',
        'complement'
    ];
}
