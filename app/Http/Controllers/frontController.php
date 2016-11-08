<?php

namespace cop1\Http\Controllers;

use Illuminate\Http\Request;
use cop1\Http\Requests;
use cop1\Http\Controllers\Controller;

class frontController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function articulos()
    {
        return view('articulos');
    }

    public function clientes()
    {
        return view('clientes');
    }

    public function configuraciones()
    {
        return view('configuraciones');
    }

    public function ventas()
    {
        return view('ventas');
    }

    public function admin()
    {
        return view('admin');
    }

}
