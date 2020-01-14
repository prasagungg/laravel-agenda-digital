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

//inti
Route::get('/', 'IntiController@index');
Route::post('/detail', 'IntiController@create');
Route::get('/show/{news}', 'IntiController@show');

//agenda
Route::get('/agenda', 'AgendaController@index');
Route::post('/agenda', 'AgendaController@store');
Route::delete('/agenda/delete/{agenda}', 'AgendaController@destroy');
Route::get('/agenda/edit/{agenda}', 'AgendaController@edit');
Route::patch('/agenda/{agenda}/edit', 'AgendaController@update');

//news

Route::get('/news', 'NewsController@index');
Route::post('/news', 'NewsController@store');
Route::delete('/news/delete/{news}', 'NewsController@destroy');
Route::get('/news/edit/{news}', 'NewsController@edit');
Route::patch('/news/{news}/edit', 'NewsController@update');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
