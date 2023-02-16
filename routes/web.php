<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CrudController::class, "index"])->name("crud.index");

// Ruta para registrar un producto
Route::post('/registrar', [CrudController::class, "create"])->name("crud.create");

// Ruta para modificar un producto
Route::post('/modificar', [CrudController::class, "update"])->name("crud.update");

// Ruta para eliminar un producto
Route::get('/eliminar-{id}', [CrudController::class, "delete"])->name("crud.delete");
