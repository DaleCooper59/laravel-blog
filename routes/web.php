<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\CrudController;
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
Route::get('articles', 'CrudController@index');
Route::get('articles/create', 'CrudController@create')->name('articles.create');
Route::post('articles/store', 'CrudController@store')->name('articles.store');
Route::get('articles/show', 'CrudController@show')->name('articles.show');
Route::get('articles/edit', 'CrudController@edit')->name('articles.edit');
Route::post('articles/update', 'CrudController@update')->name('articles.update');