<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\UserController;

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


//listing des articles
Route::get('articles', [ArticleController::class, 'index'])->name('articles.index');
//categories
Route::resource('categories', '\App\Http\Controllers\CategoryController');
//Route::resource('categories', CategoryController::class);
Route::resource('users', '\App\Http\Controllers\UserController');
//possibilité gérer autorisation avec Blade:: et Gate:: !!



Route::middleware('guest')->group(function () {

        Route::get('registers/create', [RegisterController::class, 'index'])->name('registers.create');
        Route::post('registers/store', [RegisterController::class, 'store'])->name('registers.store');


        Route::get('sessions/login', [SessionController::class, 'login'])->name('login');
        Route::post('sessions/storeLogin', [SessionController::class, 'storeLogin'])->name('sessions.storeLogin');
});


Route::middleware('auth')->group(function () {
        Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
        Route::post('articles/store', [ArticleController::class, 'store'])->name('articles.store');
        Route::get('articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');

        //Comments
        Route::post('comments/store', [CommentController::class, 'store'])->name('comments.store')->middleware('auth');

        //session
        Route::post('sessions/logout', [SessionController::class, 'logout'])->name('sessions.logout')->middleware('auth');


        ////ADMIN////
        Route::middleware('admin')->group(function () {

                Route::get('articles/edit/{article}', [ArticleController::class, 'edit'])->name('articles.edit');
                Route::post('articles/update/{article}', [ArticleController::class, 'update'])->name('articles.update');
                Route::get('articles/destroy/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

                Route::get('comments/edit/{comment}', [CommentController::class, 'edit'])->name('comments.edit');
                Route::post('comments/update/{comment}', [CommentController::class, 'update'])->name('comments.update');
                Route::get('comments/destroy/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

                Route::get('comments/approval/{article}', [CommentController::class, 'approval'])->name('comments.approval');
        });
});


