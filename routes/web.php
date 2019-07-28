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

Route::get('/','TodoController@index'); 


Route::post('/save','TodoController@store');

Route::get('/todo/delete/{id}','TodoController@delete');

Route::get('/todo/update/{id}','TodoController@edit');
Route::post('/todo/update/{id}','TodoController@update');


Route::get('/todo/completed/{id}','TodoController@complete');
Route::get('/todo/uncompleted/{id}','TodoController@uncomplete');
