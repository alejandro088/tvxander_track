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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/search/{query}', 'SearchController@index');
Route::get('/tv/{id}', 'TvShowController@show')->name('tv.show');

Auth::routes();

Route::get('/profile', 'UserController@index')->name('user.profile');
Route::get('/settings', 'UserController@settings')->name('user.settings');
Route::get('/myshows', 'UserController@myshows')->name('user.myshows');
Route::get('/unwatched', 'UserController@unwatched')->name('user.shows.unwatched');
Route::post('/settings', 'UserController@settingsStore')->name('settings.store');

