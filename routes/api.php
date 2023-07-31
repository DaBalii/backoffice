<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\viewController;
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

Route::post('/Admin/inscription',[AdminController::class,'inscription']);

Route::post('/Admin/connexion',[AdminController::class,'connexion']);

Route::get('/Admin/houses',[homeController::class,'store']);

Route::post('/reservations/create',[ReservationController::class,"store"]);
Route::get('/reservations/show',[ReservationController::class,"index"]);
Route::delete('/reservations/{id}',[ReservationController::class,"destroy"]);

Route::post('/view/create',[viewController::class,"store"]);
Route::get('/view/show',[viewController::class,"index"]);
Route::delete('/view/{id}',[viewController::class,"destroy"]);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
