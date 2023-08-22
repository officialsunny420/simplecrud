<?php

use Illuminate\Support\Facades\Route;

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

/* Route::get('/', function () {
    return view('welcome');
}); */
//use App\Http\Controllers\PostController;
  
//Route::resource('posts', PostController::class);
Route::get('/', 'App\Http\Controllers\PostController@index')->name('index');
Route::get('/create', 'App\Http\Controllers\PostController@create')->name('create');
Route::get('/show', 'App\Http\Controllers\PostController@show')->name('show');
Route::get('/edit/{id}', 'App\Http\Controllers\PostController@edit')->name('edit');

Route::post('/store', 'App\Http\Controllers\PostController@store')->name('store');

Route::post('/update/{id}', 'App\Http\Controllers\PostController@update')->name('update');
Route::get('/destroy/{id}', 'App\Http\Controllers\PostController@destroy')->name('destroy');
//Route::post('/update/{id}', 'App\Http\Controllers\PostController@update')->name('update');
  //Route::post('/update/{id}', '\App\Http\Controllers\PostController@update')->name('update');
//Route::resource('posts', PostController::class);
