<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function search($keySearch)
    {
        return $this->where('name', 'LIKE', "%{$keySearch}%")->paginate(2);
    }
}
