<?php

use App\Http\Controllers\Api\FundacionesController;
use App\Http\Controllers\Api\ProductoController;
use App\Http\Controllers\Api\ServicioController;
use App\Http\Controllers\Api\TipoProductoController;
use App\Http\Controllers\Api\UserController;
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

Route::apiResource('servicio', ServicioController::class)->names('api.v1.servicio');
Route::apiResource('fundacion', FundacionesController::class)->names('api.v1.fundacion');
Route::apiResource('tipoproducto', TipoProductoController::class)->names('api.v1.tipoproducto');
Route::apiResource('user', UserController::class)->names('api.v1.user');
Route::apiResource('producto', ProductoController::class)->names('api.v1.producto');