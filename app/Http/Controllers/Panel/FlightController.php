<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Airport;
use App\Models\Flight;
use App\Models\Plane;

class FlightController extends Controller
{
    private $flight;
    private $pages = 10;

    public function __construct(Flight $flight)
    {
        $this->flight = $flight;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Voos disponíveis";
        $flights = $this->flight->getItems($this->pages);
        return view('panel/flights/index', compact('title', 'flights'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar voos";
        $airports = Airport::pluck('name', 'id');
        $planes = Plane::pluck('name', 'id');

        return view('panel/flights/create', compact('title', 'planes', 'airports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insert = $this->flight->newFlight($request);

        if ($insert) {
            return redirect()->back()->with('mensagem', "Voo cadastrado com sucesso");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Flight $flight)
    {
        $airports = Airport::pluck('name', 'id');
        $planes = Plane::pluck('name', 'id');
        return view('panel/flights/edit', compact('flight', 'airports', 'planes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Flight $flight)
    {
        $updated = $flight->update($request->all());

        if ($updated) {
            return redirect()->back()->with('mensagem', "Voo editado com sucesso");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
