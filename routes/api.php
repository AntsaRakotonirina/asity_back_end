<?php

use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocalisationController;
use App\Http\Controllers\NamesController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ObservationsController;
use App\Http\Controllers\ParticipationController;
use App\Http\Controllers\RegionsController;
use App\Http\Controllers\ScientifiquesController;
use App\Http\Controllers\SitesController;
use App\Http\Controllers\SitesParentController;
use App\Http\Controllers\SuivisController;
use App\Http\Controllers\UsersController;
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
    //les requestes où il faut etre authentifier
    
    Route::middleware('auth:sanctum')->group(function(){
        Route::get('/logout',[AuthController::class,'logout']);
        Route::get('/check',[AuthController::class,'checkAuth']);
        Route::apiResource('/animaux',AnimalsController::class)
        ->only(['index','show']);
        Route::apiResource('/scientifiques',ScientifiquesController::class)
        ->only(['index','show']);

        //les requestes où il faut etre administrateur
        Route::middleware('is.admin')->group(function(){
            Route::apiResource('/users',UsersController::class);
            Route::apiResource('/animaux',AnimalsController::class)
            ->except(['index','show']);
            Route::prefix('/animaux/{animaux}/nom/')->group(function(){
                Route::post('/vernaculaires',[AnimalsController::class,'addVerName']);
                Route::post('/communs',[AnimalsController::class,'addComnName']);
                Route::post('/scientifiques',[AnimalsController::class,'addSciName']);
            });
            Route::delete('/noms/{type}/{id}',[NamesController::class,'deleteName']);
            Route::post('/animaux/{animaux}/notes/',[AnimalsController::class,'addNote']);
            Route::delete('/notes/{note}',[NotesController::class,'destroy']);
            Route::apiResource('/scientifiques',ScientifiquesController::class)
            ->except(['index','show']);
            Route::post('/scientifiques/file',[ScientifiquesController::class,'storeFile']);
            Route::apiResource('/siteparents',SitesParentController::class);
            Route::apiResource('regions',RegionsController::class);
            Route::apiResource('sites',SitesController::class);
            Route::apiResource('suivis',SuivisController::class);
            Route::apiResource('observations',ObservationsController::class);
            Route::apiResource('participations',ParticipationController::class);
            Route::apiResource('localisations',LocalisationController::class);
        });
        
    });
    Route::post('/login',[AuthController::class,'login']);
    
    Route::prefix('autocomplete')->group(function(){
        Route::get('animaux',[AnimalsController::class,'autoComplete']);
    });
};

Route::prefix('/v1')->group($v1Routes);