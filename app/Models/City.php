<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function airports()
    {
        return $this->hasMany(Airport::class);
    }

    //hasMany 1:N
    //belongsTo N:1

    public function search($keySearch)
    {
    }
}
