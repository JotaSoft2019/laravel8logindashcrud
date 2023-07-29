<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeguridadController;


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

/*Route::get('/', function () {
    return view('auth.login');
});*/

Route::get('/', function () {
    return view('welcome');
});




Route::resource('comex','App\Http\Controllers\ComexController');
Route::resource('gerencia','App\Http\Controllers\GerenciaController');
Route::resource('seguridadYSalud','App\Http\Controllers\SeguridadTrabajoController');
Route::resource('talentoHumano','App\Http\Controllers\TalentoHumanoController');
Route::resource('logistica','App\Http\Controllers\LogisticaController');
Route::resource('mercadeo','App\Http\Controllers\MercadeoController');
Route::resource('inventario','App\Http\Controllers\InventarioController');
Route::resource('contabilidads','App\Http\Controllers\ContabilidadController');
Route::resource('compras','App\Http\Controllers\ComprasNacionalesController');
Route::resource('comentario','App\Http\Controllers\ComentarioController');
Route::resource('articulos','App\Http\Controllers\ArticuloController');
Route::resource('lideres','App\Http\Controllers\LideresController');
Route::resource('comercials', 'App\Http\Controllers\ComercialController');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

