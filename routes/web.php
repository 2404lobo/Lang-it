<?php

use App\Http\Controllers\{TranslationsController};
use Illuminate\Support\Facades\Route;

Route::get('/', function(){return view('welcome');});
Route::post('/');

Route::get('/translations', [TranslationsController::class,'index'])->name('translations.index');
Route::post('/translations', [TranslationsController::class,'store'])->name('translations.store');

Route::get('/translations/new', [TranslationsController::class,'new'])->name('translations.new');

Route::get('/translations/{id}', [TranslationsController::class,'show'])->name('translations.show');
Route::delete('/translations/{id}', [TranslationsController::class, 'destroy'])->name('translations.destroy');
Route::put('/translations/{id}', [TranslationsController::class, 'update'])->name('translations.update');

Route::get('/translations/edit/{id}', [TranslationsController::class, 'edit'])->name('translations.edit');