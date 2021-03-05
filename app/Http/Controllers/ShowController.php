<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Inertia\Inertia;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Services\TvXanderTmdb\Repositories\TvRepository;
use App\Services\TvXanderTmdb\Repositories\TvSeasonRepository;

class ShowController extends Controller
{
    public function list($get, $tv = null)
    {
        $repository = new TvRepository($this->client);

        $collection = $tv ? $repository->$get($tv) : $repository->$get();

        return $collection->results;
    }

    public function show($tv)
    {
        $repo = new TvRepository($this->client);

        $theShow = $repo->getTvShow($tv, [
            'language' => 'es',
             'append_to_response' => 'videos,images,credits,watch/providers',
             'include_image_language' => 'en,null'
        ]);

        $credits = $theShow->credits;

        $relateds = $repo->getSimilar($tv, [
            'language' => 'es'
        ]);

        $isMyShow = (auth()->user() && auth()->user()->shows->where('show', $tv)->first()) ? true : false;

        $crew = collect($credits->crew);

        $cast = collect($credits->cast);

        $directors = $crew->filter(function ($value) {
            return $value->job == 'Director';
        });

        $writers = $crew->filter(function ($value) {
            return $value->job == 'Writer';
        });

        return Inertia::render('Tv/Show', [
            'tv' => $theShow,
            'videos' => $theShow->videos,
            'directors' => $directors->all(),
            'writers' => $writers->all(),
            'cast' => $cast,
            'crew' => $crew,
            'relateds' => $relateds,
            'isMyShow' => $isMyShow,
            'providers' => ((array)$theShow)['watch/providers'],
        ]);
    }

    public function saveShow($id)
    {
        $repo = new TvRepository($this->client);

        $show = $repo->getTvShow($id, [
            'language' => 'es'
        ]);

        //$show = $this->client->getTvApi()->getTvshow($id);
        
        $tvshow = Show::where('user_id', auth()->user()->id)->where('show', $id)->first();
        
        if (!$tvshow) {
            $tvshow = new Show();
        }
            
        $tvshow->show = $show->id;
        $tvshow->user_id = auth()->user()->id;
        $tvshow->created_by = $show->created_by;
        $tvshow->genres = $show->genres;
        $tvshow->poster_path = $show->poster_path;
        $tvshow->name = $show->name;
        $tvshow->overview = $show->overview;
        $tvshow->first_air_date = $show->first_air_date;
        $tvshow->homepage = $show->homepage;
        $tvshow->in_production = $show->in_production;
        $tvshow->last_air_date = $show->last_air_date;
        $tvshow->next_episode_to_air = $show->next_episode_to_air;
        $tvshow->last_episode_to_air = $show->last_episode_to_air;
        $tvshow->number_of_episodes = $show->number_of_episodes;
        $tvshow->number_of_seasons = $show->number_of_seasons;
        $tvshow->original_language = $show->original_language;
        $tvshow->original_name = $show->original_name;
        $tvshow->popularity_tmdb = $show->popularity;
        $tvshow->production_companies = $show->production_companies;
        $tvshow->networks = $show->networks;
        $tvshow->status = $show->status;
        $tvshow->archived = false;

        $tvshow->save();

        return $show;
    }

    public function saveSeasons($id, $show)
    {
        $seasons = $show->seasons;

        
        foreach ($seasons as $season) {
            if ($season->season_number != 0) {
                $season->show_id = $id;

                $newSeason = Season::updateOrCreate(
                    ['user_id' => auth()->user()->id,
                'show_id' => $id,
                'season_number' => $season->season_number],
                    (array)$season
                );
            
                $this->saveEpisodes($id, $newSeason);
            }
        }
    }

    public function saveEpisodes($show, $season)
    {
        $repo = new TvSeasonRepository($this->client);

        $theSeason = $repo->getSeason($show, $season->season_number, [
            'language' => 'es'
        ]);
        
        $episodes = $theSeason->episodes;

        foreach ($episodes as $episode) {
            $episode->external_id = $episode->id;
            $episode->air_date = $episode->air_date ? $episode->air_date : null;
            $episode->show_id = $show;
            $episode->season_id = $season->id;
            $episode->vote_average_tmdb = $episode->vote_average;
            $episode->vote_count_tmdb = $episode->vote_count;
            $episode->crew = json_encode($episode->crew);
            $episode->guest_stars = json_encode($episode->guest_stars);

            Episode::updateOrCreate(
                ['user_id' => auth()->user()->id,
                'show_id' => $episode->show_id,
                'season_id' => $episode->season_id,
                'episode_number' => $episode->episode_number
                ],
                (array)$episode
            );
        }
    }

    public function store($id)
    {
        $show = $this->saveShow($id);
        $this->saveSeasons($id, $show);
        //$this->saveEpisodes($id);

        return ['message' => 'show added'];
    }

    public function events()
    {
        $shows = auth()->user()->shows()->with('episodes')->get();

        $events = [];

        foreach ($shows as $show) {
            $name = $show->name;
            $episodes = $show->episodes->where('air_date', '>', now());
            foreach ($episodes as $episode) {
                $events[] = [
                    'title' => "$name {$episode->season_number}x{$episode->episode_number}",
                    'date' => $episode->air_date,
                    'url' => "/tv/$episode->show_id",
                    'description' => $episode->overview,
                 ];
            }
        }

        //dd($events);
        return $events;
    }

    public function listShow($id)
    {
        //$show = $this->client->getTvApi()->getTvshow($id);

        //$ushow = Show::where('user_id', auth()->user()->id)->where('show', $id)->first();

        $ushow = auth()->user()->shows->where('show', $id)->first();
        //dd($ushow);
        /*$seasons = [];
        for ($i=1; $i <= $ushow->number_of_seasons; $i++) {
             $seasons[] = $this->episodesOfSeason($id, $i);
        }*/

        $seasons = $this->episodesOfSeason($id, 1);

        return [
            'show' => $ushow,
            'seasons' => $seasons->toArray(),
        ];
    }

    public function episodesOfSeason($show, $season)
    {
        //$tvShow = \Tmdb::getTvSeasonApi()->getSeason($show, $season);
        //return $tvShow;

        return Season::with('episodes')
            ->where('show_id', $show)
            ->where('user_id', auth()->user()->id)
            //->where('season_number', $season)
            ->whereHas('episodes', function ($query) {
                $query->where('watched', false);
                //->where('user_id', auth()->user()->id);
            })
            ->get();
    }

    public function destroy($id)
    {
        try {
            $show = Show::where('id', $id)->where('user_id', auth()->user()->id);
            
            
            $show->delete();
            
            Episode::where('show_id', $id)->where('user_id', auth()->user()->id)->delete();

            return ['message' => 'The show has been deleted'];
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }
}
