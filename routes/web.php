<?php

use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\GerentesController;
use App\Http\Controllers\TrabajadorsController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [TrabajadorsController::class, 'index'])->name('trabajadores');
Route::get('/trabajadores/create', [TrabajadorsController::class, 'create'])->name('trabajadores.create');
Route::post('/trabajadores/create', [TrabajadorsController::class, 'store'])->name('trabajadores.create');

Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados');
Route::get('/empleados/{empleado}', [EmpleadosController::class, 'show'])->name('empleados.show');
Route::get('/empleados/create', [EmpleadosController::class, 'create'])->name('empleados.create');
Route::post('/empleados/create', [EmpleadosController::class, 'store'])->name('empleados.create');
Route::get('/empleados/edit/{empleado}', [EmpleadosController::class, 'edit'])->name('empleados.edit');
Route::put('/empleados/edit/{empleado}', [EmpleadosController::class, 'update'])->name('empleados.edit');
Route::delete('/empleados/delete/{empleado}', [EmpleadosController::class, 'destroy'])->name('empleados.delete');

Route::get('/gerentes', [GerentesController::class, 'index'])->name('gerentes');
Route::get('/gerentes/{gerente}', [GerentesController::class, 'show'])->name('gerentes.show');
Route::get('/gerentes/create', [GerentesController::class, 'create'])->name('gerentes.create');
Route::post('/gerentes/create', [GerentesController::class, 'store'])->name('gerentes.create');
Route::get('/gerentes/edit/{gerente}', [GerentesController::class, 'edit'])->name('gerentes.edit');
Route::put('/gerentes/edit/{gerente}', [GerentesController::class, 'update'])->name('gerentes.edit');
Route::delete('/gerentes/delete/{gerente}', [GerentesController::class, 'destroy'])->name('gerentes.delete');
