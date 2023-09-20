<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeguridadController;
use App\Http\Controllers\UserController;


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

Route::resource('users', 'App\Http\Controllers\UserController')->only(['index', 'edit', 'update']);
Route::resource('roles', 'App\Http\Controllers\RoleController');

Route::resource('reconocimientos', 'App\Http\Controllers\ReconocimientoController');
Route::resource('nota', 'App\Http\Controllers\NotaController');
/*Route::post('calendario', [CalendarioController::class, 'store'])->name('calendario.calendario.store');
Route::patch('calendario/update/{id}', [CalendarioController::class, 'update'])->name('calendario.calendario.update');
Route::delete('calendario/destroy/{id}', [CalendarioController::class, 'destroy'])->name('calendario.calendario.destroy');*/
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
Route::resource('mensaje', 'App\Http\Controllers\MensajeController');
Route::resource('recomendaciones', 'App\Http\Controllers\RecomendacionController');
Route::resource('agregar recomendaciones', 'App\Http\Controllers\AgregarRecomendacionController');
Route::resource('articulos', 'App\Http\Controllers\ArticuloController');
Route::resource('lideres', 'App\Http\Controllers\LideresController');
Route::resource('comercials', 'App\Http\Controllers\ComercialController');
Route::resource('cumpleaños', 'App\Http\Controllers\CumpleanioController');
Route::get('/cumpleaños/vaciar-mensajes', 'MensajeController@vaciarMensajes')->name('mensaje.vaciar');
Route::get('/recomendaciones/random', 'RecomendacionController@getRandomRecommendation')->name('recomendaciones.random');
// Ruta del dashboard (protegida con autenticación)
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');