<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
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
$v1Routes = function (){
    Route::middleware('auth:sanctum')->group(function(){

        Route::get('/logout',[AuthController::class,'logout']);
        Route::get('/check',[AuthController::class,'checkAuth']);
        Route::middleware('is.admin')->group(function(){
            Route::apiResource('/users',UsersController::class);
        });
    });
    Route::post('/login',[AuthController::class,'login']);
};

Route::prefix('/v1')->group($v1Routes);