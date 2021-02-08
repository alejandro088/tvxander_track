<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use Tmdb\Repository\MovieRepository;

class MovieController extends Controller
{

    public function show($movie)
    {

        $m = $this->client->getMoviesApi()->getMovie($movie);

        $i = $this->client->getMoviesApi()->getImages($movie);

        $v = $this->client->getMoviesApi()->getVideos($movie);

        $c = $this->client->getMoviesApi()->getCredits($movie);

        $k = $this->client->getMoviesApi()->getKeywords($movie);

        $s = $this->client->getMoviesApi()->getSimilar($movie);

        $isMyMovieFav = auth()->user()->favorites->where('external_id', $movie)->first() ? true : false;

        $crew = collect($c['crew']);

        $cast = collect($c['cast']);

        $directors = $crew->filter(function ($value, $key) {
            return $value['job'] == 'Director';
        });

        $writers = $crew->filter(function ($value, $key) {
            return $value['job'] == 'Writer';
        });

        return Inertia::render('Movie/Show', [
            'movie' => $m,
            'images' => $i,
            'videos' => $v,
            'directors' => $directors->all(),
            'writers' => $writers->all(),
            'cast' => $cast,
            'crew' => $crew,
            'keywords' => $k,
            'relateds' => $s,
            'isMyMovieFav' => $isMyMovieFav
        ]);
    }

    public function list($get, $movie = null)
    {
        $repository = new MovieRepository($this->client);

        $collection = $movie ? $repository->$get($movie) : $repository->$get();

        $movies = array();

        foreach ($collection as $item) {

            $movies[] = [
                'id' => $item->getId(),
                'title' => $item->getTitle(),
                'posterPath' => $item->getPosterPath(),
                'popularity' => $item->getPopularity(),
                'voteAverage' => $item->getVoteAverage(),
                'originalTitle' => $item->getOriginalTitle()
            ];
        }
        
        return $movies;
    }
}
