<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{

    protected $fillable = ['name', 'brand_id', 'qty_passengers', 'class'];

    public function classes($className = null)
    {
        $classes =
            [
                '' => "Escolha a classe",
                'economic' => "Economica",
                'luxury' => "Luxo"
            ];

        if (!$className) {
            return $classes;
        }

        return $classes[$className];
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function search($keySearch, $pages)
    {

        return $this
            ->where('id', $keySearch)
            ->orWhere('name', 'like', "%{$keySearch}%")
            ->orWhere('qty_passengers', $keySearch)
            ->orWhere('class', $keySearch)
            ->paginate($pages);
    }
}
