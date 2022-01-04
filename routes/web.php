<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\NutricionistaController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Tipo_medidaController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\UserController;
use Spatie\Permission\Contracts\Role;
use App\Http\Controllers\TratamientoController;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::group(['middleware'=>'auth'], function(){//si no esta logueado me manda a loguearme
    Route::resource('paciente', PacienteController::class);
    Route::resource('consulta', ConsultaController::class);
    Route::resource('unidadMedida', UnidadMedidaController::class);
    Route::resource('users', UserController::class);
    Route::resource('nutricionistas', NutricionistaController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('tipoMedida', Tipo_medidaController::class);
    Route::resource('medida', MedidaController::class);
    Route::resource('control', ControlController::class);
    Route::resource('tratamiento', TratamientoController::class);


});