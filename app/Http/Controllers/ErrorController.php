<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ErrorController extends Controller
{
    //
    public function index()
    {
        $errores=DB::select('CALL errores_user()');
        $datos=['errores' => $errores];
        return view('resultados.errores', $datos);
    }
}
