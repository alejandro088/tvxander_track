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

    function index($query)
    {
        // returns information of a movie

        $searchQuery = new TvSearchQuery();
        $searchQuery->language('ES');
        $searchQuery->searchType();

        $movies = $this->results->searchTv($query, $searchQuery);
        return view('search', compact('movies'));
    }

}
