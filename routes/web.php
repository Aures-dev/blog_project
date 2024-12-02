<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PagesController::class,'index'])->name('home');

/**
 * Routes liées à l'affichage des articles
 */
Route::get('/articles',[ArticleController::class,'index'])->name('articles');

/**
 * Routes liées aux formulaires
 */
Route::get('article/new',[ArticleController::class,'create'])->name('creation');
Route::post('article/new',[ArticleController::class,'store']);