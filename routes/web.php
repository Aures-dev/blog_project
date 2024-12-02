<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PagesController::class, 'index'])->name('home');

/**
 * Routes liées à l'affichage des articles et d'un article
 */
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/article/{id}', [ArticleController::class, 'show']);

/**
 * Routes liées aux formulaires
 */
Route::get('articles/new', [ArticleController::class, 'create'])->name('creation');
Route::post('article/new', [ArticleController::class, 'store']);
