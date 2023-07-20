<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\HomeController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::group(['prefix' => 'v1'], function() {
    Route::post('/login' , [LoginController::class , 'login'] );
    
    Route::group(['middleware' => 'auth:sanctum'], function() {
       Route::get('/home' , [HomeController::class , 'index'] );
       Route::get('/dropdowns' , [HomeController::class , 'dropdowns'] );
       Route::post('/field_surveys' , [HomeController::class , 'field_surveys'] );
       Route::post('/meter_replacements' , [HomeController::class , 'meter_replacements'] );

    });


});


