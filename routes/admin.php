<?php

use App\Http\Controllers\Admin\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Admin\AlimentoController;
use App\Http\Controllers\Admin\RecetaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\PlanAlimenticioController;

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
Route::get('/', function(){
    return view('admin.home');
});

Route::get('',[HomeController::class, 'index']);
Route::resource('/actividad', ActividadController::class)->names('admin.actividad');
Route::resource('/alimento', AlimentoController::class)->names('admin.alimento');
Route::resource('/receta', RecetaController::class)->names('admin.receta');
// Route::resource('/paciente', PacienteController::class)->names('admin.paciente');
//Route::resource('/planAlimenticio',PlanAlimenticioController::class)->names('admin.planAlimenticio');
