<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\MovieController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/movies/discover/{get}/{movie?}', [MovieController::class, 'list']);

Route::get('/tv/discover/{get}/{tv?}', [ShowController::class, 'list']);

Route::get('/movies/latest', [MovieController::class, 'latest']);

Route::get('/movies/toprated', [MovieController::class, 'toprated']);

Route::get('/movies/upcoming', [MovieController::class, 'upcoming']);

Route::get('/movies/discoverByGenres', [MovieController::class, 'discoverByGenres']);
