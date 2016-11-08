<?php

namespace cop1\Http\Controllers;
use cop1\Http\Requests;
use cop1\Http\Requests\configuracionCreateRequest;
use cop1\Http\Requests\configuracionUpdateRequest;
use Illuminate\Http\Request;
use \cop1\configuraciones;
use cop1\Http\Controllers\Controller;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class configuracionController extends Controller
{

    public function __construct(){
        $this->beforeFilter('@find',['only'=>['edit','update']]);
    }

    public function find(Route $route){
        $this->configuracion = configuraciones::find($route->getParameter('configuracion'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configuraciones = configuraciones::paginate(10);
        return view('configuracion.index',compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //return view('configuracion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(configuracionCreateRequest $request)
    {
        configuraciones::create($request->all());

        return redirect('/configuracion')->with('message','Configuracion editada correctamente');

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
        return view('configuracion.edit',['configuracion'=>$this->configuracion]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(configuracionUpdateRequest $request, $id_configuracion)
    {
        $this->configuracion->fill($request->all());
        $this->configuracion->save();

        Session::flash('message','Configuracion editada correctamente');
        return Redirect::to('/configuracion');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_configuracion)
    {
        configuraciones::destroy($id_configuracion);

        Session::flash('message','Configuracion eliminada correctamente');
        return Redirect::to('/configuracion');
    }
}
