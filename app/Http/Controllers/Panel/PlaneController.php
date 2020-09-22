<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Plane;

class PlaneController extends Controller
{
    private $plane;
    private $totalPage = 10;

    public function __construct(Plane $plane)
    {
        $this->plane = $plane;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Listagem dos aviões";

        $planes = $this->plane->with(['brand'])->paginate($this->totalPage);

        return view("panel/planes/index", compact('title', 'planes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrar";

        $brands = Brand::pluck('name', 'id');

        $classes = $this->plane->classes();

        return view("panel/planes/create", compact('title', 'classes', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->plane->create($request->all());

        return redirect()->route('planes.index')->with('mensagem', "Cadastrado com sucesso");
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
    public function edit(Plane $plane)
    {

        $brands = Brand::pluck('name', 'id');

        $classes = $this->plane->classes();

        return view('panel/planes/edit', compact('plane', 'brands', 'classes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plane $plane)
    {
        $plane->update($request->all());

        return redirect()->back()->with('mensagem', "Avião alterado com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function search()
    {
    }
}
