<?php

namespace cop1\Http\Controllers;
use cop1\Http\Requests;
use cop1\Http\Requests\clienteCreateRequest;
use cop1\Http\Requests\clienteUpdateRequest;
use Illuminate\Http\Request;
use \cop1\clientes;
use cop1\Http\Controllers\Controller;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class clienteController extends Controller
{

    public function __construct(){
        $this->beforeFilter('@find',['only'=>['edit','update']]);
    }

    public function find(Route $route){
        $this->cliente = clientes::find($route->getParameter('cliente'));
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = clientes::paginate(10);
        return view('cliente.index',compact('clientes'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(clienteCreateRequest $request)
    {
        clientes::create($request->all());

        return redirect('/cliente')->with('message','Cliente editado correctamente');
        //return 'se hizo';
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
        return view('cliente.edit',['cliente'=>$this->cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(clienteUpdateRequest $request, $id_cliente)
    {
        
        $this->cliente->fill($request->all());
        $this->cliente->save();

        Session::flash('message','Cliente editado correctamente');
        return Redirect::to('/cliente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_cliente)
    {
        clientes::destroy($id_cliente);

        Session::flash('message','Cliente eliminado correctamente');
        return Redirect::to('/cliente');
    }
}
