<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Movil\AuthController;
use App\Http\Controllers\Movil\ControlActividadMovilController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', [AuthController::class,'authenticate']);

Route::group(['middleware' => ['jwt.verify']], function() {


    Route::post('/user',[AuthController::class,'getAuthenticatedUser']);

    Route::post('/logout',[AuthController::class,'logout']);

    Route::post('/actividad',[ControlActividadMovilController::class,'lista']);

});
