<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function search($request)
    {
        $keySearch = $request->search;

        return $this->where('name', 'LIKE', "%{$keySearch}%")->paginate(10);
    }
}
