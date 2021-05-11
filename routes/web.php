<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\TmdbController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EpisodeController;

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
    return Inertia::render('Home', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
})->name('home');


Route::get('/movies/{movie}', [MovieController::class, 'show'])->name('movie.show');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/search/grid', [SearchController::class, 'grid'])->name('search.grid');

Route::get('/tv/{tv}', [ShowController::class, 'show'])->name('tv.show');

Route::get('/person/{person}', [PersonController::class, 'show'])->name('person.show');

Route::middleware(['auth:sanctum', 'verified'])->post('/tv/{show}/add', [ShowController::class, 'store'])->name('tv.store');

Route::middleware(['auth:sanctum', 'verified'])->post('/tv/{show}/update', [ShowController::class, 'store'])->name('tv.update');

Route::middleware(['auth:sanctum', 'verified'])->post('/tv/{show}/archive',  [ShowController::class, 'archive'])->name('tv.archive');

Route::middleware(['auth:sanctum', 'verified'])->delete('/tv/{show}',  [ShowController::class, 'destroy'])->name('tv.delete');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/favoritemovies', [UserController::class, 'myFavoriteMovies'])->name('user.favorite.movies');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/calendar', function () {
    return Inertia::render('Profile/Calendar');
})->name('user.calendar');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/myshows',[UserController::class, 'myshows'])->name('user.myshows');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/unwatched',[UserController::class, 'unwatched'])->name('user.unwatched');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard/shows/{id}', [ShowController::class, 'listShow'])->name('tv.listShow');

Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/season/{season}/watched', [EpisodeController::class, 'setWatchedSeason'])->name('tv.season.watched');

Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/episode/{episode}/watched', [EpisodeController::class, 'setWatched'])->name('tv.episode.watched');

Route::middleware(['auth:sanctum', 'verified'])->post('/dashboard/favorite/{source}', [UserController::class, 'addToFavorite'])->name('tv.favorite');

Route::middleware(['auth:sanctum', 'verified'])->get('/events', [ShowController::class, 'events'])->name('tv.events');
