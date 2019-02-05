<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Tmdb\Repository\SearchRepository;
use Tmdb\Model\Search\SearchQuery\TvSearchQuery;

class SearchController extends Controller
{
    private $results;

    function __construct(SearchRepository $results)
    {
        $this->results = $results;
    }

    function index(Request $request)
    {
        // returns information of a movie

        $query = $request->input('q');

        //$searchQuery = new TvSearchQuery();
        $searchQuery = new \Tmdb\Model\Search\SearchQuery\KeywordSearchQuery();
        $searchQuery->page(1);
        //$searchQuery->searchType();
        
        
        //dd($result);
        $find = $this->results->searchMulti($query, $searchQuery);
        return view('search', compact('find', 'query'));
    }

}
