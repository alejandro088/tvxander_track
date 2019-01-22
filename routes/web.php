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

Route::get('/', 'MovieController@index');
Route::get('/search/{query}', 'SearchController@index');

Auth::routes();

Route::get('/profile', 'UserController@index')->name('user.profile');
Route::get('/settings', 'UserController@settings')->name('user.settings');
Route::post('/settings', 'UserController@settingsStore')->name('settings.store');
