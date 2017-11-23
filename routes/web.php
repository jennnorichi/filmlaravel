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

Route::get('/', "FilmController@index");

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('films/create', 'FilmController@create');
Route::get('films/{slug}', 'FilmController@show');

Route::post('films/addcomment/{slug}', 'FilmController@addcomment')->name('films.addcomment');
Route::resource('films','FilmController');
