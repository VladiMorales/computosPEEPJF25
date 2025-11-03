<?php

namespace App\Http\Controllers;

use App\Models\Casilla;
use Illuminate\Http\Request;

class CasillaController extends Controller
{
    //
    public function index($eleccion)
    {
        $casillas=Casilla::orderBy('id', 'ASC')->get();
        $secciones=Casilla::select('seccion')->groupBy('seccion')->get();
        $datos=[
            'secciones'=> $secciones,
            'casillas' => $casillas,
            'eleccion' => $eleccion
        ];
        return view('elecciones.casilla', $datos);
    }

    public function eleccion(Request $request)
    {   
        $eleccion=$request->eleccion;
        $casilla=$request->casilla;          
        return redirect()->route($eleccion, $casilla);
    }
}
