<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\State;

class CityController extends Controller
{

    private $city;
    private $pages = 20;

    public function __construct(City $city)
    {
        $this->city = $city;
    }

    public function index(State $state)
    {
        $title = "Cidades";
        $cities = $state->cities()->paginate($this->pages);
        return view('panel/cities/index', compact('cities', 'state'));
    }

    public function search(Request $request, State $state)
    {
        $dataForm = $request->all();
        $keySearch = $request->key_search;

        $cities = $state->searchCities($keySearch, $this->pages);

        return view('panel/cities/index', compact('cities', 'state', 'dataForm'));
    }
}
