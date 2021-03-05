<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use Tmdb\Model\Search\SearchQuery\TvSearchQuery;
use Tmdb\Model\Search\SearchQuery\MovieSearchQuery;
use Tmdb\Model\Search\SearchQuery\PersonSearchQuery;
use Tmdb\Model\Search\SearchQuery\CompanySearchQuery;
use App\Services\TvXanderTmdb\Repositories\SearchRepository;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $repository = new SearchRepository($this->client);

        $movies = $repository->searchMovie($request->input('query'), ['language' => 'es', 'page' => 1]);

        $sMovies = $movies->results;
    
        $tv = $repository->searchTv($request->input('query'), ['language' => 'es', 'page' => 1]);

        $sShows = $tv->results;

        $persons = $repository->searchPerson($request->input('query'), ['language' => 'es', 'page' => 1]);

        $sPersons = $persons->results;

        $companies = $repository->searchCompany($request->input('query'), ['language' => 'es', 'page' => 1]);

        $sCompanies = $companies->results;

        return Inertia::render('Search/List', [
            'results' => [
                'movies' => $sMovies,
                'shows' => $sShows,
                'persons' => $sPersons,
                'companies' => $sCompanies,
            ],
            'total' => [
                'movies' => $movies->total_results,
                'shows' => $tv->total_results,
                'persons' => $persons->total_results,
                'companies' => $companies->total_results,

            ],
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
