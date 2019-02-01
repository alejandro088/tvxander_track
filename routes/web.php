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
Route::get('/search', 'SearchController@index')->name('search');
Route::get('/tv/{id}', 'TvShowController@show')->name('tv.show');

Auth::routes();

Route::get('/profile', 'UserController@index')->name('user.profile');
Route::get('/settings', 'UserController@settings')->name('user.settings');
Route::get('/myshows', 'UserController@myshows')->name('user.myshows');
Route::get('/unwatched', 'UserController@unwatched')->name('user.shows.unwatched');
Route::get('/calendar', 'UserController@calendar')->name('user.calendar');


Route::post('/settings', 'UserController@settingsStore')->name('settings.store');
Route::post('/tv/{show}/add', 'TvShowController@store')->name('tv.store');
Route::post('/tv/{show}/archive', 'TvShowController@archive')->name('tv.archive');
Route::delete('/tv/{show}/delete', 'TvShowController@delete')->name('tv.delete');
Route::get('/shows/{id}', 'TvShowController@list')->name('tv.list');
Route::get('/episodes/{show}/{season}', 'TvShowController@episodesOfSeason')->name('tv.season.episodes');
Route::get('/update/{show}/', 'TvShowController@updateShow')->name('tv.update');

Route::post('/episode/{episode}/watched', 'TvShowController@setWatched')->name('tv.episode.watched');
Route::post('/season/{season}/watched', 'EpisodeTvController@setWatchedSeason')->name('tv.season.watched');

Route::get('/season/{show}/{season}', 'EpisodeTvController@show')->name('season.show');
