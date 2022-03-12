<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NamesController;
use App\Http\Controllers\NotesController;
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
    Route::apiResource('/animaux',AnimalsController::class);
    Route::prefix('/animaux/{animaux}/nom/')->group(function(){
        Route::post('/vernaculaires',[AnimalsController::class,'addVerName']);
        Route::post('/communs',[AnimalsController::class,'addComnName']);
        Route::post('/scientifiques',[AnimalsController::class,'addSciName']);
    });
    Route::delete('/noms/{type}/{id}',[NamesController::class,'deleteName']);
    Route::post('/animaux/{animaux}/notes/',[AnimalsController::class,'addNote']);
    Route::delete('/notes/{note}',[NotesController::class,'destroy']);
    Route::post('/animaux/filter',[AnimalsController::class,'filter']);
};

Route::prefix('/v1')->group($v1Routes);