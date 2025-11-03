<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EleccionesController extends Controller
{
    //
    public function index()
    {
        return view('elecciones.elegir');
    }

    //
    public function resultados()
    {
        return view('resultados.resultados');
    }
    
}
