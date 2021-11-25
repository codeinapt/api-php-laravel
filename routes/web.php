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
    return view('auth.login');
});

// Definición de ruta para acceder a las vista almacenadas en  views/productos

Route::resource('productos', ProductosController::class)->middleware('auth');

Auth::routes(['reset'=>false]);

Route::get('/home', [ProductosController::class, 'index'])->name('home');

// Ruta de vista principal luego que el usuario se logee
Route::group(['midleware' => 'auth'], function (){

    Route::get('/', [ProductosController::class, 'index'])->name('home');
});
