<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    public function search($request, $pages)
    {
        $keySearch = $request->search;

        return $this->where('name', 'LIKE', "%{$keySearch}%")->paginate($pages);
    }
}
