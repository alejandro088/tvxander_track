<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use Tmdb\Repository\MovieRepository;

class MovieController extends Controller
{

    public function show($movie)
    {

        $theMovie = $this->client->getMoviesApi()->getMovie($movie);

        $i = $this->client->getMoviesApi()->getImages($movie);

        $videos = $this->client->getMoviesApi()->getVideos($movie);

        $credits = $this->client->getMoviesApi()->getCredits($movie);

        $keywords = $this->client->getMoviesApi()->getKeywords($movie);

        $relateds = $this->client->getMoviesApi()->getSimilar($movie);

        $isMyMovieFav = (auth()->user() && auth()->user()->favorites->where('external_id', $movie)->first()) ? true : false;

        $crew = collect($credits['crew']);

        $cast = collect($credits['cast']);

        $directors = $crew->filter(function ($value, $key) {
            return $value['job'] == 'Director';
        });

        $writers = $crew->filter(function ($value, $key) {
            return $value['job'] == 'Writer';
        });

        $images['backdrops'] = collect($i['backdrops'])->forPage(1,9)->toArray();

        $images['posters'] = collect($i['posters'])->forPage(1,9)->toArray();

        return Inertia::render('Movie/Show', [
            'movie' => $theMovie,
            'images' => $images,
            'videos' => $videos,
            'directors' => $directors->all(),
            'writers' => $writers->all(),
            'cast' => $cast,
            'crew' => $crew,
            'keywords' => $keywords,
            'relateds' => $relateds,
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
