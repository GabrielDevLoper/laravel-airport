<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function search($keySearch, $pages)
    {
        return $this->where('name', 'LIKE', "%{$keySearch}%")->paginate($pages);
    }

    public function planes()
    {
        return $this->hasMany(Plane::class);
    }
}
