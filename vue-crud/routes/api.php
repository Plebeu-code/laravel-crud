<?php

use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class, "index"]);
Route::post('/user', [UserController::class, "store"]);
Route::get('/user/{user}', [UserController::class, "show"]);
Route::post('/user/{id}/delete', [UserController::class, "destroy"]);
Route::put('/user/{id}/update', [UserController::class, "update"]);
Route::post('/user/{id}/address', [UserController::class, "addAddress"]);
Route::post('/address/{id}/delete', [UserController::class, "destroyAddress"]);
