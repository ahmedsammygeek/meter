<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Board\UserController;
use App\Http\Controllers\Board\SettingsController;
use App\Http\Controllers\Board\LoginController;
use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\Board\WorkerController;
use App\Http\Controllers\Board\FieldSurveysController;
use App\Http\Controllers\Board\AreaController;
use App\Http\Controllers\Board\CityController;
use App\Http\Controllers\Board\MeterReplacementController;
use App\Http\Controllers\Board\OtherReplacmentController;
use App\Http\Controllers\Board\DistrictController;
use App\Http\Controllers\Board\WorkerTaskController;
Route::get('/' , function(){
	return view('welcome');
});

Route::get('Board/login' , [LoginController::class , 'form' ] )->name('board.login.form');
Route::post('Board/login' , [LoginController::class , 'login' ] )->name('board.login.post');

Route::group(['prefix' => 'Board' , 'as' => 'board.' , 'middleware' => 'admin' ], function() {
	Route::get('/' , [BoardController::class , 'index'] )->name('index');
	Route::get('/logout' , [BoardController::class , 'logout'] )->name('logout');
	Route::resource('users', UserController::class );
	Route::resource('workers', WorkerController::class );
	Route::resource('areas', AreaController::class );
	Route::resource('cities', CityController::class );
	Route::resource('districts', DistrictController::class );
	Route::get('settings/edit'  , [SettingsController::class , 'edit'] )->name('settings.edit');
	Route::patch('settings'  , [SettingsController::class , 'update'] )->name('settings.update');
	Route::get('/profile' , [BoardController::class , 'show_profile'] )->name('profile.show');
	Route::patch('/profile' , [BoardController::class , 'update_profile'] )->name('profile.update');
	Route::get('/password' , [BoardController::class , 'show_password'] )->name('password.show');
	Route::patch('/password' , [BoardController::class , 'update_password'] )->name('password.update');
	Route::get('field_surveys' , [FieldSurveysController::class , 'index'] )->name('field_surveys.index');
	Route::get('field_surveys/{field_survey}' , [FieldSurveysController::class , 'show'] )->name('field_surveys.show');
	Route::get('field_surveys/{field_survey}/download' , [FieldSurveysController::class , 'download'] )->name('field_surveys.download');

	Route::get('meter_replacements' , [MeterReplacementController::class , 'index'] )->name('meter_replacements.index');
	Route::get('meter_replacements/{meter_replacement}' , [MeterReplacementController::class , 'show'] )->name('meter_replacements.show');
	Route::get('meter_replacements/{meter_replacement}/download' , [MeterReplacementController::class , 'download'] )->name('meter_replacements.download');

	Route::get('other_replacements' , [OtherReplacmentController::class , 'index'] )->name('other_replacements.index');
	Route::get('other_replacements/{other_replacement}' , [OtherReplacmentController::class , 'show'] )->name('other_replacements.show');
	Route::get('other_replacements/{other_replacement}/download' , [OtherReplacmentController::class , 'download'] )->name('other_replacements.download');

	Route::get('workers/{worker}/tasks/create' , [WorkerTaskController::class , 'create'] )->name('workers.tasks.create');
	Route::post('workers/{worker}/tasks' , [WorkerTaskController::class , 'store'] )->name('workers.tasks.store');
	Route::get('workers/{worker}/tasks' , [WorkerTaskController::class , 'index'] )->name('workers.tasks.index');

});



















