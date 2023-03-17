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

Route::get('/', [ TrabajadorsController::class, 'index' ]);

Route::get('/empleados', [ EmpleadosController::class, 'index' ]);
Route::get('/empleados/create', [ EmpleadosController::class, 'create' ])->name('empleados.create');
Route::post('/empleados/create', [ EmpleadosController::class, 'store' ])->name('empleados.create');
Route::get('/empleados/edit/{empleado}', [ EmpleadosController::class, 'edit' ])->name('empleados.edit');
Route::put('/empleados/edit/{empleado}', [ EmpleadosController::class, 'update' ])->name('empleados.edit');
Route::delete('/empleados/delete/{empleado}', [ EmpleadosController::class, 'destroy' ])->name('empleados.delete');

Route::get('/gerentes', [ GerentesController::class, 'index' ]);
Route::get('/gerentes/create', [ GerentesController::class, 'create' ])->name('gerentes.create');
Route::post('/gerentes/create', [ GerentesController::class, 'store' ])->name('gerentes.create');
Route::get('/gerentes/edit/{gerente}', [ GerentesController::class, 'edit' ])->name('gerentes.edit');
Route::put('/gerentes/edit/{gerente}', [ GerentesController::class, 'update' ])->name('gerentes.edit');
Route::delete('/gerentes/delete/{gerente}', [ GerentesController::class, 'destroy' ])->name('gerentes.delete');