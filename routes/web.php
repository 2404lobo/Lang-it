<?php

use App\Http\Controllers\{
    TranslationsController
};
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/translations', [TranslationsController::class,'index'])->name('translations.index');
Route::get('/translations/new', [TranslationsController::class,'new'])->name('translations.new');
Route::post('/translations', [TranslationsController::class,'store'])->name('translations.store');