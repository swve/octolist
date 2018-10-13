<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/todo', 'TodoController@index')->name('todo');
Route::resource('todo', 'TodoController');
Route::post('/todo/update/{id}', 'TodoController@update')->name('todoUpdate');
Route::post('/todo/destroy/{id}', 'TodoController@destroy')->name('todoDestroy');
Route::post('/todo/store', 'TodoController@store')->name('todoStore');


