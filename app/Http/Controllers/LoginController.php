<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            return redirect('/elecciones'); // Si ya está autenticado, redirigir al dashboard
        }
        return view('auth.login');        
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        //Autenticacion
        if(!Auth::attempt(['username' => $request->username, 'password' => $request->password])){
            return back()->with('mensaje', 'Credenciales Incorrectas');
        }

        /* if (!auth()->attempt($request->only('username', 'password')))
        {
            return back()->with('mensaje', 'Credenciales Incorrectas');
        } */

        //Redireccionar a la vista para escoger las elecciones a capturar
        return redirect()->route('elecciones');

    }
}
