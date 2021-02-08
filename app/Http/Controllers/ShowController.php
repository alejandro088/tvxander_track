<?php

namespace App\Http\Controllers;

use App\Models\Show;

use Inertia\Inertia;
use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Services\Tmdb\Client;
use Tmdb\Repository\TvRepository;

class ShowController extends Controller
{

    public function list($get, $tv = null)
    {
        $repository = new TvRepository($this->client);

        $collection = $tv ? $repository->$get($tv) : $repository->$get();

        $shows = array();

        foreach ($collection as $item) {

            

            $shows[] = [
                'id' => $item->getId(),
                'title' => $item->getName(),
                'posterPath' => $item->getPosterPath(),
                'popularity' => $item->getPopularity(),
                'voteAverage' => $item->getVoteAverage(),
                'originalTitle' => $item->getOriginalName()
            ];

        }
        
        return $shows;
    }

    public function show($tv)
    {

        $m = $this->client->getTvApi()->getTvshow($tv);

        $i = $this->client->getTvApi()->getImages($tv);

        $v = $this->client->getTvApi()->getVideos($tv);

        $c = $this->client->getTvApi()->getCredits($tv);

        $k = $this->client->getTvApi()->getKeywords($tv);

        $s = $this->client->getTvApi()->getSimilar($tv);

        $isMyShow = auth()->user()->shows->where('show', $tv)->first() ? true : false;

        $crew = collect($c['crew']);

        $cast = collect($c['cast']);

        $directors = $crew->filter(function ($value, $key) {
            return $value['job'] == 'Director';
        });

        $writers = $crew->filter(function ($value, $key) {
            return $value['job'] == 'Writer';
        });

        $images['backdrops'] = collect($i['backdrops'])->forPage(1,10)->toArray();

        $images['posters'] = collect($i['posters'])->forPage(1,10)->toArray();

        return Inertia::render('Tv/Show', [
            'tv' => $m,
            'images' => $images,
            'videos' => $v,
            'directors' => $directors->all(),
            'writers' => $writers->all(),
            'cast' => $cast,
            'crew' => $crew,
            'keywords' => $k,
            'relateds' => $s,
            'isMyShow' => $isMyShow,
        ]);
    }

    public function saveShow($id){
        $show = $this->client->getTvApi()->getTvshow($id);
        
        $tvshow = Show::where('user_id', auth()->user()->id)->where('show', $id)->first();
        
        if(!$tvshow){
            $tvshow = new Show();
        }
            
        $tvshow->show = $show['id'];
        $tvshow->user_id = auth()->user()->id;
        $tvshow->created_by = $show['created_by'];
        $tvshow->genres = $show['genres'];
        $tvshow->poster_path = $show['poster_path'];
        $tvshow->name = $show['name'] ;
        $tvshow->overview = $show['overview'];
        $tvshow->first_air_date = $show['first_air_date'];
        $tvshow->homepage = $show['homepage'];
        $tvshow->in_production = $show['in_production'];
        $tvshow->last_air_date = $show['last_air_date'];
        $tvshow->next_episode_to_air = $show['next_episode_to_air'];
        $tvshow->last_episode_to_air = $show['last_episode_to_air'];
        $tvshow->number_of_episodes = $show['number_of_episodes'];
        $tvshow->number_of_seasons = $show['number_of_seasons'];
        $tvshow->original_language = $show['original_language'];
        $tvshow->original_name = $show['original_name'];
        $tvshow->popularity_tmdb = $show['popularity'];
        $tvshow->production_companies = $show['production_companies'];
        $tvshow->networks = $show['networks'];
        $tvshow->status = $show['status'];
        $tvshow->archived = false;

        $tvshow->save();
    }

    public function saveSeasons($id){
        $show = $this->client->getTvApi()->getTvshow($id);
        $seasons = $show['seasons'];

        
        foreach ($seasons as $season) {
      
            
            $season['show_id'] = $id;
            //dd($season['_id']);
            $newseason = Season::updateOrCreate(
                ['user_id' => auth()->user()->id,
                'show_id' => $id,
                'season_number' => $season['season_number']],
                $season);
            //dd($newseason);
            $this->saveEpisodes($id, $newseason);    
        }
        
        
    }

    public function saveEpisodes($show, $newseason)
    {
        $season = $this->client->getTvSeasonApi()->getSeason($show, $newseason->season_number);

        $episodes = $season['episodes'];

        foreach ($episodes as $episode) {
    
            $episode['external_id'] = $episode['id'];
            $episode['air_date'] = $episode['air_date'] ? $episode['air_date'] : null;
            $episode['show_id'] = $show;
            $episode['season_id'] = $newseason->id;
            $episode['vote_average_tmdb'] = $episode['vote_average']; 
            $episode['vote_count_tmdb'] = $episode['vote_count'];
            $episode['crew'] = json_encode($episode['crew']); 
            $episode['guest_stars'] = json_encode($episode['guest_stars']); 

            //$showid = TvShow::where('show', $show)->where('user_id', auth()->user()->id)->first();
            //dd($showid->id);
            Episode::updateOrCreate(
                ['user_id' => auth()->user()->id,
                'show_id' => $episode['show_id'],
                'season_id' => $episode['season_id'],
                'episode_number' => $episode['episode_number']
                ],
                $episode);
    
        }
    }

    public function store($id)
    {
        
        $this->saveShow($id);
        $this->saveSeasons($id);
        //$this->saveEpisodes($id);

        return ['message' => 'show added'];
    }

    public function events()
    {
        $shows = auth()->user()->shows()->with('episodes')->get();

        $events = [];

        foreach ($shows as $show) {
            $name = $show->name;
            $episodes = $show->episodes->where('air_date','>',now());
            foreach ($episodes as $episode) {

                
                $events[] = [ 
                    'title' => "$name {$episode->season_number}x{$episode->episode_number}",
                    'start' => $episode->air_date,
                    'url' => "/tv/show/$episode->show_id",
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
            
            $deletedRows = Episode::where('show_id', $id)->where('user_id', auth()->user()->id)->delete();

            return ['message' => 'The show has been deleted'];  
            
        } catch (\Throwable $th) {
            return $th->getMessage();
        }      
    }

}
