<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\SessionsController;

Route::get('/', [PagesController::class, 'index'])->name('home');

/**
 * Routes liées à l'affichage des articles et d'un article
 */
Route::get('/articles', [ArticleController::class, 'index'])->name('articles');
Route::get('/article/{id}', [ArticleController::class, 'show']);

/**
 * Routes liées aux formulaires
 */
Route::get('articles/new', [ArticleController::class, 'create'])->name('creation')->middleware('auth');
Route::post('article/new', [ArticleController::class, 'store'])->middleware('auth');

/**
 * Routes d'authentification
 */
Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
Route::post('/register', [RegisterController::class, 'create'])->name('register')->middleware('guest');
Route::get('/login', [SessionsController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [SessionsController::class, 'authenticate'])->name('login')->middleware('guest');
Route::post('/logout', [SessionsController::class, 'logout'])->name('logout')->middleware('auth');

/**
* Routes liées à l'utilisateur
*/
Route::get('/profile', [UserController::class, 'index'])->name('profile')->middleware('auth');