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
Route::post('/signup', 'RegistrationController@store');
Route::get('/signup', 'RegistrationController@create');
Route::get('/logout', 'LoginController@logout');
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@login');

Route::get('/', 'moviesController@index')->name('home');
// 'middleware' => 'auth',
Route::group([ 'prefix'=>'movies'], function () {
  Route::get('/', 'moviesController@index')->middleware('auth','user');
  Route::get('/search', 'moviesController@search')->middleware('auth');
  Route::get('/add', 'AgentController@create')->middleware('auth','agent');
  Route::post('/add', 'AgentController@store')->middleware('auth','agent');
  Route::get('/{id}', 'moviesController@show')->middleware('auth', 'user');
  //Route::get('/{id}', 'AgentController@show')->middleware('auth','user');
  Route::post('/{id}/comment', 'moviesController@comment')->middleware('auth','user');
  Route::post('/{id}/reserve', 'moviesController@reserve')->middleware('auth','user');
  Route::post('/{id}/rate', 'moviesController@rate')->middleware('auth','user');
  Route::get('/{id}/edit', 'AgentController@edit')->middleware('auth','agent');
  Route::post('/{id}/edit', 'AgentController@update')->middleware('auth','agent');
  Route::get('/{id}/delete', 'AgentController@destroy')->middleware('auth','agent');
});

Route::group([ 'prefix'=>'agent', 'middleware' => 'auth'], function () {
  Route::get('/', 'AgentController@index')->middleware('auth','agent');
  //Route::get('/{id}', 'AgentController@show')->middleware('auth','agent');
  Route::get('/{id}/delete', 'AgentController@destroy')->middleware('auth','agent');
  Route::get('/{id}/agent', 'UserController@makeAgent')->middleware('auth','agent');
  Route::get('/{id}/approve', 'AgentController@approve')->middleware('auth','agent');
  Route::get('/comment', 'AgentController@comment')->middleware('auth','agent');
  Route::get('/comments/{id}/delete', 'AgentController@commentDelete')->middleware('auth','agent');
  Route::get('/ticket', 'AgentController@ticket')->middleware('auth','agent');
});

Route::get('/profile', 'UserController@index');
Route::get('/ticket', 'UserController@getTicket');

Route::group([ 'prefix'=>'admin', 'middleware' => 'auth'], function () {
  Route::get('/', 'UserController@users')->middleware('auth','admin');
  Route::get('/{id}', 'UserController@show')->middleware('auth','admin');
  Route::get('/{id}/delete', 'UserController@destroy')->middleware('auth','admin');
  Route::get('/{id}/agent', 'UserController@makeAgent')->middleware('auth','admin');
  Route::get('/comments', 'UserController@comment')->middleware('auth','admin');
  Route::get('/movies', 'UserController@movies')->middleware('auth','admin');
});
