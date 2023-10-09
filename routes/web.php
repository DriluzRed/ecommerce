<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ValoracionesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin', function () {
    return view('admin.menu');
})->name('admin-menu');
//categorias
Route::get('/admin/categorias', [CategoriasController::class, 'index'])
    ->name('admin-categorias');
Route::get('/admin/categorias/crear', [CategoriasController::class, 'create'])
    ->name('admin-categorias-crear');
Route::post('/admin/categorias/store', [CategoriasController::class, 'store'])
    ->name('admin-categorias-store');
Route::get('/admin/categorias/editar/{categoria}', [CategoriasController::class, 'edit'])
    ->name('admin-categorias-editar');
Route::post('/admin/categorias/update/{categoria}', [CategoriasController::class, 'update'])
    ->name('admin-categorias-update');
Route::get('/admin/categorias/eliminar/{categoria}', [CategoriasController::class, 'destroy'])
    ->name('admin-categorias-eliminar');
    // productos
Route::get('/admin/productos', [ProductosController::class, 'index'])
    ->name('admin-productos');
Route::get('/admin/productos/crear', [ProductosController::class, 'create'])
    ->name('admin-productos-crear');
Route::post('/admin/productos/store', [ProductosController::class, 'store'])
    ->name('admin-productos-store');
Route::get('/admin/productos/editar/{producto}', [ProductosController::class, 'edit'])
    ->name('admin-productos-editar');
Route::post('/admin/productos/update/{producto}', [ProductosController::class, 'update'])
    ->name('admin-productos-update');
Route::get('/admin/productos/eliminar/{producto}', [ProductosController::class, 'destroy'])
    ->name('admin-productos-eliminar');
    //valoraciones
Route::get('/admin/valoraciones', [ValoracionesController::class, 'index'])
    ->name('admin-valoraciones');
Route::get('/admin/valoraciones/crear', [ValoracionesController::class, 'create'])
    ->name('admin-valoraciones-crear');
Route::post('/admin/valoraciones/store', [ValoracionesController::class, 'store'])
    ->name('admin-valoraciones-store');
Route::get('/admin/valoraciones/editar/{valoracion}', [ValoracionesController::class, 'edit'])
    ->name('admin-valoraciones-editar');
Route::post('/admin/valoraciones/update/{valoracion}', [ValoracionesController::class, 'update'])
    ->name('admin-valoraciones-update');
Route::get('/admin/valoraciones/eliminar/{valoracion}', [ValoracionesController::class, 'destroy'])
    ->name('admin-valoraciones-eliminar');
