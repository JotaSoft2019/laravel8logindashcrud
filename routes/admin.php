<?php

use Illuminate\Support\Facades\Route;

use App\Controllers\AdnController;
use App\Controllers\ArticuloController;
use App\Controllers\CalendarioController;
use App\Controllers\ComentarioController;
use App\Controllers\ComercialController;
use App\Controllers\ComexController;
use App\Controllers\ComprasNacionalesController;
use App\Controllers\ContabilidadController;
use App\Controllers\EventController;
use App\Controllers\GerenciaController;
use App\Controllers\InventarioController;
use App\Controllers\LideresController;
use App\Controllers\LogisticaController;
use App\Controllers\MercadeoController;
use App\Controllers\NotaController;
use App\Controllers\ReconocimientoController;
use App\Controllers\SeguridadTrabajoController;
use App\Controllers\TalentoController;
use App\Controllers\TalentoHumanoController;
use App\Controllers\UserController;

Route::resource('adn', AdnController::class);
Route::resource('articulos', ArticuloController::class);
Route::resource('users', UserController::class)->names('admin.users');
Route::resource('reconocimientos', ReconocimientoController::class);

Route::resource('calendario', CalendarioController::class);
Route::post('calendario', [CalendarioController::class, 'store'])->name('calendario.calendario.store');
Route::patch('calendario/update/{id}', [CalendarioController::class, 'update'])->name('calendario.calendario.update');
Route::delete('calendario/destroy/{id}', [CalendarioController::class, 'destroy'])->name('calendario.calendario.destroy');
Route::resource('eventos', EventController::class);
Route::resource('talento', TalentoController::class);
Route::resource('comex', ComexController::class);
Route::resource('gerencia', GerenciaController::class);
Route::resource('seguridadYSalud', SeguridadTrabajoController::class);
Route::resource('talentoHumano', TalentoHumanoController::class);
Route::resource('logistica', LogisticaController::class);
Route::resource('mercadeo', MercadeoController::class);
Route::resource('inventario', InventarioController::class);
Route::resource('contabilidads', ContabilidadController::class);
Route::resource('compras', ComprasNacionalesController::class);
Route::resource('comentario', ComentarioController::class);
Route::resource('lideres', LideresController::class);
Route::resource('comercials', ComercialController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});