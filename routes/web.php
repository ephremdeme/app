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

Route::get('/show', function(){
  //$price = DB::table('')->avg('rate');
  $price=DB::table('users')->find(15)->balance;
  return $price;
});

Route::get('test' , function(){
  redirect('/');
});



Route::post('/signup', 'RegistrationController@store');
Route::get('/signup', 'RegistrationController@create');
Route::get('/logout', 'LoginController@logout');
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@login');

Route::get('/', 'moviesController@index')->name('home');
// 'middleware' => 'auth',
Route::group([ 'prefix'=>'movies', 'middleware' => 'auth'], function () {
  Route::get('/', 'moviesController@index');
  Route::get('/search', 'moviesController@search');
  Route::get('/add', 'moviesController@create');
  Route::post('/add', 'moviesController@store');
  Route::get('/{id}', 'moviesController@show');
  Route::post('/{id}/comment', 'moviesController@comment');
  Route::post('/{id}/reserve', 'moviesController@reserve');
  Route::post('/{id}/rate', 'moviesController@rate');
  Route::get('/{id}/edit', 'moviesController@edit');
  Route::post('/{id}/edit', 'moviesController@update');
});

Route::group([ 'prefix'=>'admin', 'middleware' => 'admin'], function () {
  Route::get('/users', 'UserController@index');
  Route::get('/users/{id}', 'UserController@show');
});
