<?php

use App\Http\Controllers\CasillaController;
use App\Http\Controllers\EleccionesController;
use App\Http\Controllers\JDController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MCController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SCJNController;
use App\Http\Controllers\SRController;
use App\Http\Controllers\SSController;
use App\Http\Controllers\TDJController;
use App\Http\Controllers\ErrorController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [LoginController::class, 'index'])->name('home');
Route::get('/', function () {
    return redirect('/login'); // Redirige a /login cuando accedas a /
});

Route::post('/login', [LoginController::class, 'store'])->name('login');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');


Route::get('/elecciones', [EleccionesController::class, 'index'])->middleware('auth')->name('elecciones');

Route::get('/casilla/{eleccion}', [CasillaController::class, 'index'])->middleware('auth')->name('casilla');
Route::post('/eleccion', [CasillaController::class, 'eleccion'])->middleware('auth')->name('eleccion');


//Formularios de captura
Route::get('/SCJN/{casilla}', [SCJNController::class, 'index'])->middleware('auth')->name('SCJN');
Route::get('/TDJ/{casilla}', [TDJController::class, 'index'])->middleware('auth')->name('TDJ');
Route::get('/SS/{casilla}', [SSController::class, 'index'])->middleware('auth')->name('SS');
Route::get('/SR/{casilla}', [SRController::class, 'index'])->middleware('auth')->name('SR');
Route::get('/MC/{casilla}', [MCController::class, 'index'])->middleware('auth')->name('MC');
Route::get('/JD/{casilla}', [JDController::class, 'index'])->middleware('auth')->name('JD');

//Resultados
Route::get('/resultados', [EleccionesController::class, 'resultados'])->name('resultados');

Route::get('/res-SCJN', [SCJNController::class, 'resultados'])->name('res-SCJN');
Route::get('/res-TDJ', [TDJController::class, 'resultados'])->name('res-TDJ');
Route::get('/res-SS', [SSController::class, 'resultados'])->name('res-SS');
Route::get('/res-SR', [SRController::class, 'resultados'])->name('res-SR');
Route::get('/res-MC', [MCController::class, 'resultados'])->name('res-MC');
Route::get('/res-JD', [JDController::class, 'resultados'])->name('res-JD');

Route::get('/errores', [ErrorController::class, 'index'])->name('errores');