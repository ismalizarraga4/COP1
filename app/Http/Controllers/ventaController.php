<?php

namespace cop1\Http\Controllers;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use cop1\Http\Requests;
use cop1\Http\Controllers\Controller;
use Session;
use Redirect;
use Illuminate\Routing\Route;

class ventaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('venta.index');
        
    }
    //funcion para traes clientes
    public function muestra_clientes(Request $request, $nom_ctl)
    {
        if($request->ajax()){
            $results = DB::select("select * from clientes where nombre like :nombre", ["nombre"=>"%$nom_ctl%"]);
            
            return $results;
        }
        
    }
    //funcion para traer articulos
    public function muestra_articulos(Request $request, $nom_art)
    {
        if($request->ajax()){
            $results = DB::select("select * from articulos where descripcion like :descripcion", ["descripcion"=>"%$nom_art%"]);
            
            return $results;
        }
        
    }
    //funcion para traer articulos a la lista de venta
    public function traeArticulos(Request $request, $id_art)
    {
        if($request->ajax()){
            $results = DB::select("SELECT * FROM articulos WHERE id_articulo =  :id_art", ["id_art"=>"$id_art"]);
            
            return $results;
        }
        
    }
    //funcion para traer configuracion a la lista de venta y obtener precios
    public function traeConfiguracion(Request $request)
    {
        if($request->ajax()){
            $results = DB::select("SELECT * FROM configuraciones");
            
            return $results;
        }
        
    }
    //funcion para guardar la venta
    public function guardaVenta(Request $request,$id_ctl,$cant,$anio,$mes,$dia)
    {
        $fc_venta = $anio."-".$mes."-".$dia;
        if($request->ajax()){
            $results = DB::insert("insert into ventas (id_cliente, cantidad_total, fc_venta) values (?, ?, ?)", ["$id_ctl","$cant","$fc_venta"]);
            
            return (string)$results;
        }
        
    }
    //funciones para descontar el producto adquirido
    public function descuentaProducto(Request $request,$id_art)
    {
        if($request->ajax()){
            $results = DB::select("SELECT * FROM articulos WHERE id_articulo = :id_art",["id_art"=>"$id_art"]);
            
            return $results;
        }
        
    }
    public function descProducto(Request $request,$id_art,$result)
    {
        if($request->ajax()){
            $results = DB::update("update articulos set existencia = :existencia where id_articulo = :id_art", ["existencia"=>"$result","id_art"=>"$id_art"]);
            
            return (string)$results;
        }
        
    }
    //para validar la existencia de articulos en la BD
    public function validaArticulo(Request $request,$id_art)
    {
        if($request->ajax()){
            $results = DB::select("SELECT * FROM articulos WHERE id_articulo = :id_art",["id_art"=>"$id_art"]);
            
            return $results;
        }
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "esto seria el formulario a crear";    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
