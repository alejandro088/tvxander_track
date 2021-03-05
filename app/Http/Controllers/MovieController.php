<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use App\Services\TvXanderTmdb\Repositories\MovieRepository;

class MovieController extends Controller
{
    public function show($movie)
    {

        $repo = new MovieRepository($this->client);

        $theMovie = $repo->getMovie($movie, [
            'language' => 'es',
             'append_to_response' => 'videos,images,credits',
             'include_image_language' => 'en,null'
        ]);

        $credits = $theMovie->credits;

        $relateds = $repo->getSimilar($movie, [
            'language' => 'es'
        ]);

        $isMyMovieFav = (auth()->user() && auth()->user()->favorites->where('external_id', $movie)->first()) ? true : false;

        $crew = collect($credits->crew);

        $cast = collect($credits->cast);

        $directors = $crew->filter(function ($value) {
            return $value->job == 'Director';
        });

        $writers = $crew->filter(function ($value) {
            return $value->job == 'Writer';
        });

        return Inertia::render('Movie/Show', [
            'movie' => $theMovie,
            'videos' => $theMovie->videos,
            'directors' => $directors->all(),
            'writers' => $writers->all(),
            'cast' => $cast,
            'crew' => $crew,
            'relateds' => $relateds,
            'isMyMovieFav' => $isMyMovieFav
        ]);
    }

    public function list($get, $movie = null)
    {
        $repository = new MovieRepository($this->client);

        $collection = $movie ? $repository->$get($movie) : $repository->$get();
        
        return $collection->results;
    }

    public function discoverByGenres()
    {
        $repository = new MovieRepository($this->client);

        $genres = [
            'action' => 28, 
            'comedy' => 35, 
            'drama' => 18,
            'terror' => 27,
            'scifi' => 878,
            'suspense' => 53
        ];

        $collection = array();

        foreach ($genres as $key => $genre) {
            $collection[$key] = $repository->getDiscover([
                'with_genres' => $genre,
            ]);
        }
        
        
        return $collection;
    }
}
