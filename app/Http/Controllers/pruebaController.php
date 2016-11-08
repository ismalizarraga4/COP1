<?php

namespace cop1\Http\Controllers;

use Illuminate\Http\Request;

use cop1\Http\Requests;
use cop1\Http\Controllers\Controller;

class pruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return "hola este es el controlador";
    }

    public function nombre($nombre)
    {
        //
        return "hola mi nombre es: ".$nombre." desde el controlador";
    }
}
