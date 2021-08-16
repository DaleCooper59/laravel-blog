<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Models\Article;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
        return view('welcome');
});

//listing des articles
Route::get('articles', [ArticleController::class,'index'])->name('articles.index');
Route::get('articles/create', [ArticleController::class,'create'])->name('articles.create');
Route::post('articles/store', [ArticleController::class,'store'])->name('articles.store');
Route::get('articles/show/{article}', [ArticleController::class,'show'])->name('articles.show');
Route::get('articles/edit/{article}', [ArticleController::class,'edit'])->name('articles.edit');
Route::post('articles/update/{article}', [ArticleController::class,'update'])->name('articles.update');
Route::get('articles/destroy/{article}', [ArticleController::class,'destroy'])->name('articles.destroy');

//categories
Route::resource('categories', '\App\Http\Controllers\CategoryController');

//Comments
Route::post('comments/store', [CommentController::class,'store'])->name('comments.store')->middleware('auth');
Route::get('comments/edit/{comment}', [CommentController::class,'edit'])->name('comments.edit')->middleware('auth');
Route::post('comments/update/{comment}', [CommentController::class,'update'])->name('comments.update')->middleware('auth');
Route::get('comments/destroy/{comment}', [CommentController::class,'destroy'])->name('comments.destroy')->middleware('auth');

//Register
//Route::resource('registers', '\App\Http\Controllers\RegisterController');

Route::get('registers/create', [RegisterController::class,'index'])->name('registers.create')->middleware('guest');
Route::post('registers/store', [RegisterController::class,'store'])->name('registers.store')->middleware('guest');

//session
Route::post('sessions/logout', [SessionController::class,'logout'])->name('sessions.logout')->middleware('auth');
Route::get('sessions/login', [SessionController::class,'login'])->name('sessions.login')->middleware('guest');
Route::post('sessions/storeLogin', [SessionController::class,'storeLogin'])->name('sessions.storeLogin')->middleware('guest');

