<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Board\UserController;
use App\Http\Controllers\Board\SettingsController;
use App\Http\Controllers\Board\LoginController;
use App\Http\Controllers\Board\BoardController;
use App\Http\Controllers\Board\WorkerController;
use App\Http\Controllers\Board\FieldSurveysController;
use App\Http\Controllers\Board\AreaController;

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
	Route::get('settings/edit'  , [SettingsController::class , 'edit'] )->name('settings.edit');
	Route::patch('settings'  , [SettingsController::class , 'update'] )->name('settings.update');
	Route::get('/profile' , [BoardController::class , 'show_profile'] )->name('profile.show');
	Route::patch('/profile' , [BoardController::class , 'update_profile'] )->name('profile.update');
	Route::get('/password' , [BoardController::class , 'show_password'] )->name('password.show');
	Route::patch('/password' , [BoardController::class , 'update_password'] )->name('password.update');
	Route::get('field_surveys' , [FieldSurveysController::class , 'index'] );
});



















