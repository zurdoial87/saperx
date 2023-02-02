<?php

use App\Http\Controllers\ApiUserController;
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



Route::get('/api_user' , [ApiUserController::class, 'index'] );
Route::get('/api_user/{id}' , [ApiUserController::class, 'show'] );
Route::post('/api_user' , [ApiUserController::class, 'store'] );
Route::put('/api_user/{id}' , [ApiUserController::class, 'update'] );
Route::delete('/api_user/{id}' , [ApiUserController::class, 'destroy'] );