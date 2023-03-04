<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GradoController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\SeccionController;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

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
//AUTENTICACION
Route::post('/user/registro', [RegistroController::class,'store']);
Route::post('/login', [AuthController::class,'login']);

Route::group(['middleware'=>['auth:sanctum']], function(){

    Route::get('/usuario/get', [AuthController::class,'index']);
    Route::get('/grado/get', [GradoController::class,'index']);
    Route::get('/seccion/get', [SeccionController::class,'index']);
    Route::get('/alumno/get', [AlumnoController::class,'index']);
    Route::post('/alumno/store', [AlumnoController::class,'store']);

        Route::post('/alumno/nuevo_grado', [AlumnoController::class,'update']);

        Route::post('/grado/store', [GradoController::class,'store']);

        Route::post('/seccion/store', [SeccionController::class,'store']);



    Route::post('/logout', [AuthController::class,'logout']);
});
