<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

use Illuminate\Http\Request;
use Tmdb\Repository\SearchRepository;
use Tmdb\Model\Search\SearchQuery\TvSearchQuery;
use Tmdb\Model\Search\SearchQuery\MovieSearchQuery;
use Tmdb\Model\Search\SearchQuery\PersonSearchQuery;
use Tmdb\Model\Search\SearchQuery\CompanySearchQuery;
use Tmdb\Model\Search\SearchQuery\KeywordSearchQuery;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = new MovieSearchQuery();
        $query->page(1);

        $repository = new SearchRepository($this->client);

        $movies = $repository->searchMovie($request->input('query'), $query);

        $sMovies = array();
        
        foreach ($movies as $item) {
            $sMovies[] = [
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
        
        $query = new TvSearchQuery();
        $query->page(1);

        $tv = $repository->searchTv($request->input('query'), $query);

        $sShows = array();

        foreach ($tv as $item) {
            $sShows[] =  [
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

        $query = new PersonSearchQuery();
        $query->page(1);

        $persons = $repository->searchPerson($request->input('query'), $query);

        $sPersons = array();
        
        foreach ($persons as $item) {

            $person = $this->client->getPeopleApi()->getPerson($item->getId());

            $sPersons[] = [
                'id' => $person['id'],
                'name' => $person['name'],
                'biography' => $person['biography'],
                'birthday' => $person['birthday'],
                'popularity' => $item->getPopularity(),
                'placeOfBirth' => $person['place_of_birth'],
                'profilePath' => $item->getProfilePath(),
            ];
        }

        $query = new CompanySearchQuery();
        $query->page(1);

        $companies = $repository->searchCompany($request->input('query'), $query);

        $sCompanies = array();
        
        foreach ($companies as $item) {

            $sCompanies[] = [
                'id' => $item->getId(),
                'name' => $item->getName(),
                'logoPath' => $item->getLogoPath(),
                'parentCompany' => $item->getParentCompany(),
            ];
        }

        /*
        foreach ($collection as $item) {



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

            if(get_class($item) == "Tmdb\Model\Person"){
                $results['person'][] = [
                    'id' => $item->getId(),
                    'name' => $item->getName(),
                    'biography' => $item->getBiography(),
                    'birthday' => $item->getBirthday(),
                    'popularity' => $item->getPopularity(),
                    'placeOfBirth' => $item->getPlaceOfBirth(),
                    'profileImage' => $item->getProfileImage(),
                ];
            }
                
        }
        */

        return Inertia::render('Search/List', [
            'results' => [
                'movies' => $sMovies,
                'shows' => $sShows,
                'persons' => $sPersons,
                'companies' => $sCompanies,
            ],
            'total' => [
                'movies' => $movies->getTotalResults(),
                'shows' => $tv->getTotalResults(),
                'persons' => $persons->getTotalResults(),
                'companies' => $companies->getTotalResults(),

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
