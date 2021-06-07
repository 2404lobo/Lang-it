<?php

use App\Http\Controllers\{TranslationsController};
use App\Http\Controllers\{UserController};
use App\Http\Controllers\{HomeController};
use App\Http\Controllers\{ProfileController};
use Illuminate\Support\Facades\Route;
Auth::routes();

Route::get('/',[HomeController::class,'redirect'])->name('redirect');

Route::post('/translations', [TranslationsController::class,'store'])->name('translations.store');
Route::get('/translations/new', [TranslationsController::class,'new'])->name('translations.new');
Route::get('/translations/{id}', [TranslationsController::class,'show'])->name('translations.show');
Route::delete('/translations/{id}', [TranslationsController::class, 'destroy'])->name('translations.destroy');
Route::put('/translations/{id}', [TranslationsController::class, 'update'])->name('translations.update');
Route::get('/translations/edit/{id}', [TranslationsController::class, 'edit'])->name('translations.a');
Route::any('/translations/search', [TranslationsController::class,'search'])->name('translations.search');

Route::get('/home',[HomeController::class,'index'])->name('home');
Route::post('/home',[HomeController::class,'new'])->name('home.new');
Route::post('/home/{id}',[HomeController::class,'edit'])->name('home.edit');
Route::put('/home/{id}',[HomeController::class,'apply'])->name('home.apply');
Route::delete('/home/{id}',[HomeController::class,'delete'])->name('home.delete');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
});

