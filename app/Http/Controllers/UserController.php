<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Services\TvXanderTmdb\Repositories\TvRepository;
use App\Services\TvXanderTmdb\Repositories\MovieRepository;

class UserController extends Controller
{
    public function myshows()
    {
        $shows = auth()->user()->shows()->with('episodes')->get();
        
        $currentShows = $shows->where('archived', false)->where('status', 'Returning Series');

        $repo = new TvRepository($this->client);
        
        foreach ($currentShows as $key => $show) {
            $theShow = $repo->getTvShow($show->show, [
                'language' => 'es',
                 'include_image_language' => 'en,null'
            ]);

            $show->last_episode_to_air = $theShow->last_episode_to_air;
            $show->next_episode_to_air = $theShow->next_episode_to_air;

            $currentShows[$key] = $show;
        }
        

        $archivedShows = $shows->where('archived', true);
        
        $endedShows = $shows->where('status', 'Ended');

        $canceledShows = $shows->where('status', 'Canceled');

        return Inertia::render('Profile/MyShows', [
            'currentShows' => $currentShows,
            'endedShows' => $endedShows,
            'archivedShows' => $archivedShows,
            'canceledShows' => $canceledShows,
        ]);
    }

    public function myFavoriteMovies()
    {
        $favoriteMovies = auth()->user()->favorites()->where('type', '\App\Model\Movie::class')->get();

        $movies = array();

        $repo = new MovieRepository($this->client);
        
        foreach ($favoriteMovies as $movie) {
            $movies[] = $repo->getMovie($movie->external_id, [
                'language' => 'es',
                 'append_to_response' => 'videos,images,credits',
                 'include_image_language' => 'en,null'
            ]);
        }

        return $movies;
    }

    public function unwatched()
    {
        $shows = auth()->user()->shows;

        return Inertia::render('Profile/Unwatched', [
            'shows' => $shows,
        ]);
    }

    public function addToFavorite(Request $request, $source)
    {
        $data = (object) $request->data;

        $favorite = new Favorite();
        $favorite->user_id = auth()->user()->id;
        $favorite->external_id = $data->id;
        if ($source == 'tv') {
            $favorite->type = "\App\Model\Show::class";
        } elseif ($source == 'movie') {
            $favorite->type = "\App\Model\Movie::class";
        }
        
        $favorite->save();

        return $favorite;
    }
}
