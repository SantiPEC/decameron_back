<?php

use App\Http\Controllers\CiudadesController;
use App\Http\Controllers\ConfiguracionHabitacionesController;
use App\Http\Controllers\HotelesController;
use App\Http\Controllers\TipoAcomodacionesController;
use App\Http\Controllers\TipoHabitacionesController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// CIUDADES
Route::get('/ciudades', [CiudadesController::class,'index']);

// ACOMODACIONES
Route::get('/acomodaciones', [TipoAcomodacionesController::class,'index']);

// TIPOS DE HABITACION
Route::get('/tipoHabitacion', [TipoHabitacionesController::class,'index']);

// HOTELES
Route::get('/hoteles', [HotelesController::class,'index']);
Route::post('/hoteles-store', [HotelesController::class,'store']);
Route::put('/hoteles-delete/{id}', [HotelesController::class,'destroy']);

// CONFIGURACION DE HABITACIONES POR HOTEL
Route::post('/config-hab-hotel-store', [ConfiguracionHabitacionesController::class,'store']);
Route::get('/config-hab-hotel', [ConfiguracionHabitacionesController::class,'index']);
Route::put('/config-hab-hotel-delete/{id}', [ConfiguracionHabitacionesController::class,'destroy']);
