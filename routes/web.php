<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\AdministradorController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\ControlActividadController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\MedidaController;
use App\Http\Controllers\NutricionistaController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\Suscripcion_usuarioController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\Tipo_medidaController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\UnidadMedidaController;
use App\Http\Controllers\UserController;
use App\Models\Tratamiento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facade\Excel;

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
Route::get('/quienes',[App\Http\Controllers\HomeController::class,'quienesSomos'])->name('quienes');
Route::get('/listaNutricionista',[App\Http\Controllers\HomeController::class,'listaN'])->name('lista');

Route::get('/reportepaciente-pdf', [PacienteController::class, 'impriPDF']);
// Route::get('/reportepaciente-excel', [PacienteController::class, 'UserExport']);
Route::get('/reportenutricionistas-pdf', [NutricionistaController::class, 'impriPDF']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth'], function () { //si no esta logueado me manda a loguearme

    Route::resource('/admin/paciente', PacienteController::class);
    Route::get('paciente/actividad/{paciente}',[ControlActividadController::class,'index'])->name('paciente.actividad');
    Route::get('paciente/perfil/{paciente}', [PacienteController::class, 'perfil'])->name('paciente.perfil');
    Route::resource('profile', ProfileController::class);
    Route::resource('consulta', ConsultaController::class);
    Route::resource('unidadMedida', UnidadMedidaController::class);
    Route::resource('users', UserController::class);
    Route::resource('nutricionistas', NutricionistaController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('tipoMedida', Tipo_medidaController::class);
    Route::resource('medida', MedidaController::class);
    Route::resource('control', ControlController::class);
    Route::resource('tratamientos', TratamientoController::class);
    Route::resource('administradors', AdministradorController::class);
    Route::resource('suscripcions', SuscripcionController::class);
    Route::resource('suscripcionUsuarios', Suscripcion_usuarioController::class);
});

Route::get( '/tratamiento/generar',  [TratamientoController::class, 'generar'] );
