<?php

namespace cop1\Http\Controllers;
use cop1\Http\Requests;
use cop1\Http\Requests\articuloCreateRequest;
use cop1\Http\Requests\articuloUpdateRequest;
use Illuminate\Http\Request;
use \cop1\articulos;
use cop1\Http\Controllers\Controller;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class articuloController extends Controller
{

    public function __construct(){
        $this->beforeFilter('@find',['only'=>['edit','update']]);
    }

    public function find(Route $route){
        $this->articulo = articulos::find($route->getParameter('articulo'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articulos = articulos::paginate(10);
        return view('articulo.index',compact('articulos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articulo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(articuloCreateRequest $request)
    {
        articulos::create($request->all());

        return redirect('/articulo')->with('message','Articulo editado correctamente');
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
    public function edit($id)
    {
        return view('articulo.edit',['articulo'=>$this->articulo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(articuloUpdateRequest $request, $id_articulo)
    {
        $this->articulo->fill($request->all());
        $this->articulo->save();

        Session::flash('message','Articulo editado correctamente');
        return Redirect::to('/articulo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_articulo)
    {
        articulos::destroy($id_articulo);

        Session::flash('message','Articulo eliminado correctamente');
        return Redirect::to('/articulo');
    }
}
