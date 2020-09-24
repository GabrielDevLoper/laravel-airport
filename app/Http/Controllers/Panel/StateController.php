<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\State;

class StateController extends Controller
{

    private $state;
    private $pages = 10;

    public function __construct(State $state)
    {
        $this->state = $state;
    }


    public function index(State $state)
    {
        $states = $this->state->paginate($this->pages);
        $title = "Estados";
        return view('panel/states/index', compact('title', 'states'));
    }

    public function search(Request $request)
    {
        $keySearch = $request->key_search;

        $states = $this->state->search($keySearch);

        $title = "Resultado da pesquisa: {$keySearch}";

        return view('panel/states/index', compact('states', 'title'));
    }
}
