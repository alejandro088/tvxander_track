<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use Tmdb\Repository\SearchRepository;
use Tmdb\Model\Search\SearchQuery\KeywordSearchQuery;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = new KeywordSearchQuery();
        $query->page(1);

        $repository = new SearchRepository($this->client);

        $collection = $repository->searchMulti($request->input('query'), $query);

        //dd($collection);

        //dd($collection->toArray());

        $results = array();

        foreach ($collection as $item) {
            //dd(get_class($value));

            if(get_class($item) == "Tmdb\Model\Movie"){

                $results['movie'][] = [
                'id' => $item->getId(),
                'title' => $item->getTitle(),
                'posterPath' => $item->getPosterPath(),
                'popularity' => $item->getPopularity(),
                'voteAverage' => $item->getVoteAverage(),
                'originalTitle' => $item->getOriginalTitle(),
                'overview' => $item->getOverview(),
                'releaseDate' => $item->getReleaseDate(),
                'runtime' => $item->getRuntime(),
             ];
            }

            if(get_class($item) == "Tmdb\Model\Tv"){
                $results['tv'][] = [
                    'id' => $item->getId(),
                    'title' => $item->getName(),
                    'posterPath' => $item->getPosterPath(),
                    'popularity' => $item->getPopularity(),
                    'voteAverage' => $item->getVoteAverage(),
                    'originalTitle' => $item->getOriginalName(),
                    'firstAirDate' => $item->getFirstAirDate(),
                    'overview' => $item->getOverview(),
                    'runtime' => $item-> getEpisodeRunTime(),
                ];
            }
                
        }

        return Inertia::render('Search/List', [
            'results' => $results,
            'query' =>$request->input('query')
        ]);
    }

    public function grid(Request $request)
    {
        return Inertia::render('Search/Grid', [
            'query' =>$request->input('query')
        ]);
    }
}
