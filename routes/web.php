<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.master');
});

/**
 * Routes liées aux articles
 */
Route::get('/articles',[ArticleController::class,'index'])->name('articles');