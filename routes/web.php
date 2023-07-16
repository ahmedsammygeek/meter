<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\Board\UserController;
use App\Http\Controllers\Board\OfferController;
use App\Http\Controllers\Board\ProductController;
use App\Http\Controllers\Board\ServiceController;
use App\Http\Controllers\Board\ProjectController;
use App\Http\Controllers\Board\ReviewController;
use App\Http\Controllers\Board\SettingsController;
use App\Http\Controllers\Board\TermsController;
use App\Http\Controllers\Board\AboutController;
use App\Http\Controllers\Board\LoginController;
use App\Http\Controllers\Board\BoardController;



Route::get('test' , function(){

	dd('done');
});

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
	], function(){ 
		Route::get('/', [SiteController::class , 'index' ] );
		Route::get('/about', [SiteController::class , 'about' ] )->name('about');
		Route::get('/services', [SiteController::class , 'services' ] )->name('services');
		Route::get('/offers', [SiteController::class , 'offers' ] )->name('offers');
		Route::get('/contact', [SiteController::class , 'contact' ] )->name('contact');
		Route::get('/products/{product}', [SiteController::class , 'show_product' ] )->name('products.show');
		Route::get('/services/{service}', [SiteController::class , 'show_service' ] )->name('services.show');
		Route::get('/projects/{project}', [SiteController::class , 'show_project' ] )->name('projects.show');
		Route::get('/terms', [SiteController::class , 'terms' ] )->name('terms');
		Route::post('/send'  , [SiteController::class , 'send'] )->name('contact.send');
	});




Route::get('Board/login' , [LoginController::class , 'form' ] )->name('board.login.form');
Route::post('Board/login' , [LoginController::class , 'login' ] )->name('board.login.post');

Route::group(['prefix' => 'Board' , 'as' => 'board.' , 'middleware' => 'admin' ], function() {
	Route::get('/' , [BoardController::class , 'index'] )->name('index');
	Route::get('/logout' , [BoardController::class , 'logout'] )->name('logout');
	Route::resource('users', UserController::class );
	Route::resource('offers', OfferController::class );
	Route::resource('products', ProductController::class );
	Route::resource('services', ServiceController::class );
	Route::resource('projects', ProjectController::class );
	Route::resource('reviews', ReviewController::class );
	Route::get('settings/edit'  , [SettingsController::class , 'edit'] )->name('settings.edit');
	Route::patch('settings'  , [SettingsController::class , 'update'] )->name('settings.update');
	Route::get('terms/edit'  , [TermsController::class , 'edit'] )->name('terms.edit');
	Route::patch('terms'  , [TermsController::class , 'update'] )->name('terms.update');
	Route::get('about/edit'  , [AboutController::class , 'edit'] )->name('about.edit');
	Route::patch('about'  , [AboutController::class , 'update'] )->name('about.update');

	Route::get('/profile' , [BoardController::class , 'show_profile'] )->name('profile.show');
	Route::patch('/profile' , [BoardController::class , 'update_profile'] )->name('profile.update');


	Route::get('/password' , [BoardController::class , 'show_password'] )->name('password.show');
	Route::patch('/password' , [BoardController::class , 'update_password'] )->name('password.update');
});



















