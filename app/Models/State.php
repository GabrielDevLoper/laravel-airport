<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function search($keySearch)
    {
        return $this->where('name', $keySearch)
            ->orWhere('initials', $keySearch)
            ->get();
    }
}
