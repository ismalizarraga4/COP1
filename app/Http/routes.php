<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('admin', 'frontController@admin');

Route::resource('cliente', 'clienteController');
Route::resource('articulo', 'articuloController');
Route::resource('configuracion', 'configuracionController');
Route::resource('ventas', 'ventasController');

Route::resource('/', 'ventaController@index');
Route::get('tcliente/{nom_ctl}', 'ventaController@muestra_clientes');
Route::get('tcart/{nom_art}', 'ventaController@muestra_articulos');
Route::get('tccompra/{id_art}', 'ventaController@traeArticulos');
Route::post('tcconf', 'ventaController@traeConfiguracion');
Route::get('tcventa/{id_ctl}/{cant}/{anio}/{mes}/{dia}', 'ventaController@guardaVenta');
Route::get('tcdescprod/{id_art}', 'ventaController@descuentaProducto');
Route::get('tcdescproducto/{id_art}/{result}', 'ventaController@descProducto');
Route::get('tcvalpro/{id_art}', 'ventaController@validaArticulo');
/*
ruta con diversos metodos
Route::get('controlador','pruebaController@index');

Route::get('connombre/{nombre}','pruebaController@nombre');

ruta sencillas
Route::resource('venta','ventaController'); 

Route::get('/', function () {
    return view('welcome');
});
 ruta con variables get
Route::get('nombre/{nombre}', function ($nombre) {
    return 'mi nombre es: '.$nombre;
});

Route::get('edad/{edad}', function ($edad) {
    return 'mi edad es: '.$edad;
});

Route::get('edad2/{edad?}', function ($edad = 20) {
    return 'mi edad es: '.$edad;
});

Route::get('prueba', function () {
    return 'bienvenido esta es la prueba';
});
*/