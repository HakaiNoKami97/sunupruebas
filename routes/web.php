<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProyectoController;

Route::resource('proyectos', ProyectoController::class);
Route::resource('proyectos.tareas', TareaController::class);
Route::resource('proyectos.miembros', MiembroEquipoController::class);
Route::resource('proyectos.tareas.comentarios', ComentarioController::class);
Route::resource('proyectos.comentarios', ComentarioController::class);




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
asjdkjaskjdkasjdkjaksdjkjasd
|
*/

Route::get('/', function () {
    return view('welcome');
});
