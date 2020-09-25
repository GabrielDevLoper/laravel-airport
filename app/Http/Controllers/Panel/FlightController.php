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
        $airports = Airport::pluck('name', 'id');

        return view('panel/flights/index', compact('title', 'flights', 'airports'));
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
        $nameFile = '';

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            $nameFile = uniqid(date('HisYmd')) . '.' . $request->image->extension();

            $request->image->storeAs('flights', $nameFile);
        }



        if ($this->flight->newFlight($request, $nameFile)) {
            return redirect()->route('flights.index')->with('mensagem', "Voo cadastrado com sucesso");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Flight $flight)
    {
        $flight->with(['origin', 'destination', 'planes']);

        return view('panel/flights/show', compact('flight'));
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
        $nameFile = $flight->image;

        if ($request->hasFile('image') && $request->file('image')->isValid()) {

            if ($flight->image) {
                $nameFile = $flight->image;
            } else {
                $nameFile = uniqid(date('HisYmd')) . '.' . $request->image->extension();
            }

            if (!$request->image->storeAs('flights', $nameFile)) {
                return redirect()->back()->with('error', "Falha ao realizar upload");
            }
        }

        $updated = $flight->updateFlight($request, $nameFile);

        if ($updated) {
            return redirect()->route('flights.index')->with('mensagem', "Voo editado com sucesso");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Flight $flight)
    {
        $flight->delete();
        return redirect()->route('flights.index')->with('mensagem', "Voo deletado com sucesso");
    }


    public function search(Request $request)
    {
        $flights = $this->flight->search($request, $this->pages);

        $dataForm = $request->except('_token');
        $airports = Airport::pluck('name', 'id');

        return view('panel/flights/index', compact('flights', 'airports'));
    }
}
