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

Route::post('calendario', [CalendarioController::class, 'store'])->name('calendario.calendario.store');
Route::patch('calendario/update/{id}', [CalendarioController::class, 'update'])->name('calendario.calendario.update');
Route::delete('calendario/destroy/{id}', [CalendarioController::class, 'destroy'])->name('calendario.calendario.destroy');
Route::resource('eventos', 'App\Http\Controllers\EventController');
Route::resource('calendario', 'App\Http\Controllers\CalendarioController');
Route::resource('adn', 'App\Http\Controllers\AdnController');
Route::resource('talento', 'App\Http\Controllers\TalentoController');
Route::resource('comex', 'App\Http\Controllers\ComexController');
Route::resource('gerencia', 'App\Http\Controllers\GerenciaController');
Route::resource('seguridadYSalud', 'App\Http\Controllers\SeguridadTrabajoController');
Route::resource('talentoHumano', 'App\Http\Controllers\TalentoHumanoController');
Route::resource('logistica', 'App\Http\Controllers\LogisticaController');
Route::resource('mercadeo', 'App\Http\Controllers\MercadeoController');
Route::resource('inventario', 'App\Http\Controllers\InventarioController');
Route::resource('contabilidads', 'App\Http\Controllers\ContabilidadController');
Route::resource('compras', 'App\Http\Controllers\ComprasNacionalesController');
Route::resource('comentario', 'App\Http\Controllers\ComentarioController');
Route::resource('articulos', 'App\Http\Controllers\ArticuloController');
Route::resource('lideres', 'App\Http\Controllers\LideresController');
Route::resource('comercials', 'App\Http\Controllers\ComercialController');

// Ruta del dashboard (protegida con autenticación)
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
