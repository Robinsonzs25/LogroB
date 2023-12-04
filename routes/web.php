<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;

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

Route::get('/', [ProductoController::class, 'index']);
Route::post('/producto', [ProductoController::class, 'Agregar']);
Route::get('/producto/categoria/{categoriaId}', [ProductoController::class, 'filtrar']);
Route::delete('/producto/{id}',[AutorController::class,'eliminar']);


Route::get('/cat', [CategoriaController::class, 'index']);
Route::post('/cate', [CategoriaController::class, 'registro']);