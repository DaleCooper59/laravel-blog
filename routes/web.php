<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
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


Route::resource('categories', '\App\Http\Controllers\CategoryController');