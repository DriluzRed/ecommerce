<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriasController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/categorias', [CategoriasController::class, 'index']);
Route::post('/categorias', [CategoriasController::class, 'store']);
Route::put('/categorias/{categoria}', [CategoriasController::class, 'update']);
Route::delete('/categorias/{categoria}', [CategoriasController::class, 'destroy']);
Route::get('/categorias/{categoria}', [CategoriasController::class, 'show']);

Route::get('/productos', [ProductosController::class, 'index']);
Route::post('/productos', [ProductosController::class, 'store']);
Route::put('/productos/{producto}', [ProductosController::class, 'update']);
Route::delete('/productos/{producto}', [ProductosController::class, 'destroy']);
Route::get('/productos/{producto}', [ProductosController::class, 'show']);

Route::get('/valoraciones', [ValoracionesController::class, 'index']);
Route::post('/valoraciones', [ValoracionesController::class, 'store']);
Route::put('/valoraciones/{valoracion}', [ValoracionesController::class, 'update']);
Route::delete('/valoraciones/{valoracion}', [ValoracionesController::class, 'destroy']);
Route::get('/valoraciones/{valoracion}', [ValoracionesController::class, 'show']);


//productos por categoria
Route::get('/categorias/{categoria}/productos', [CategoriasController::class, 'productoCategoria']);
Route::post('/categorias/{categoria}/productos', [CategoriasController::class, 'StoreproductoCategoria']);
Route::put('/categorias/{categoria}/productos/{producto}', [CategoriasController::class, 'updateproductoCategoria']);
Route::delete('/categorias/{categoria}/productos/{producto}', [CategoriasController::class, 'destroyproductoCategoria']);
Route::get('/categorias/{categoria}/productos/{producto}', [CategoriasController::class, 'showproductoCategoria']);

//valoraciones por producto
Route::get('/productos/{producto}/valoraciones', [ProductosController::class, 'valoracionesProducto']);
Route::post('/productos/{producto}/valoraciones', [ProductosController::class, 'StorevaloracionesProducto']);
Route::put('/productos/{producto}/valoraciones/{valoracion}', [ProductosController::class, 'updatevaloracionesProducto']);
Route::delete('/productos/{producto}/valoraciones/{valoracion}', [ProductosController::class, 'destroyvaloracionesProducto']);


