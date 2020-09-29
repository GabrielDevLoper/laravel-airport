<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\City;

class AirportController extends Controller
{

    private $airport;
    private $city;
    private $pages = 10;

    public function __construct(Airport $aiport, City $city)
    {
        $this->airport = $aiport;
        $this->city = $city;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(City $city)
    {
        $airports = $city->airports()->paginate($this->pages);
        $title = "Aeroportos da cidade: {$city->name}";

        return view('panel/airports/index', compact('title', 'airports', 'city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(City $city)
    {
        $title = "Cadastrar novo aeroporto na cidade: {$city->name}";
        $city->pluck('name', 'id');
        return view('panel/airports/create', compact('title', 'city'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, City $city)
    {
        if ($this->airport->create($request->all())) {
            return redirect()->route('airports.index', $city)->with('mensagem', 'Aeroporto cadastrado com sucesso');
        }

        return redirect()->back()->withInput();
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(City $city, Airport $airport)
    {
        return view('panel/airports/show', compact('city', 'airport'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city, Airport $airport)
    {
        return view('panel/airports/edit', compact('city', 'airport'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city, Airport $airport)
    {
        $airport->update($request->all());
        return redirect()->route('airports.index', $city)->with('mensagem', 'Aeroporto alterado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city, Airport $airport)
    {
        $airport->delete();
        return redirect()->route('airports.index', $city)->with('mensagem', 'Aeroporto deletado com sucesso');
    }
}
