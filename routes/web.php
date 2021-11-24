<?php

use Illuminate\Support\Facades\Route;

// Referencia de ruta a el archivo de control de produtos
use App\Http\Controllers\ProductosController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Definición de ruta para acceder a las vista almacenadas en  views/productos

Route::resource('productos', ProductosController::class);
