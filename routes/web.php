<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
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
Route::get('articles', [CrudController::class,'index'])->name('articles.index');
Route::get('articles/create', [CrudController::class,'create'])->name('articles.create');
Route::post('articles/store', [CrudController::class,'store'])->name('articles.store');
Route::get('articles/show/{id}', [CrudController::class,'show'])->name('articles.show');
Route::get('articles/edit/{id}', [CrudController::class,'edit'])->name('articles.edit');
Route::post('articles/update', [CrudController::class,'update'])->name('articles.update');