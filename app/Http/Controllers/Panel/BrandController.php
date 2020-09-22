<?php

namespace App\Http\Controllers\Panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreAndUpdateFormRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    private $brand;
    protected $totalPage = 5;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Marcas de Aviões";
        $brands = $this->brand->paginate($this->totalPage);
        return view("panel/brands/index", compact('title', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Cadastrando marca de aviões";
        return view("panel/brands/create-edit", compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreAndUpdateFormRequest $request)
    {
        $insert = $this->brand->create($request->all());

        if ($insert) {
            return redirect()->back()->with('mensagem', "Marca cadastrada com sucesso");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        return view("panel/brands/show", compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     * 
     */
    public function edit(Brand $brand)
    {
        if (!$brand) {
            return redirect()->back();
        }

        $title = "Editar marca: {$brand->name}";

        return view('panel/brands/create-edit', compact("title", "brand"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandStoreAndUpdateFormRequest $request, Brand $brand)
    {
        $brand->update($request->all());

        return redirect()->back()->with('mensagem', "Marca alterada com sucesso");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')->with('mensagem', "Marca deletada com sucesso");
    }

    public function search(Request $request)
    {
        $dataForm = $request->except('_token');
        $brands = $this->brand->search($request->key_search);
        // $title = "Brands, filtros para: {$request->key_search}";
        return view('panel.brands.index', compact('brands', 'dataForm'));
    }
}
