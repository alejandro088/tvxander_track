<?php

namespace App\Services\TvXanderTmdb\Repositories;

class MovieRepository extends GenericRepository
{

    public function getMovie($movie, array $params = null)
    {
        return $this->client->createRequest('movie/', $movie, null, $params);
    }

    public function getSimilar($movie, array $params = null)
    {
        return $this->client->createRequest('movie/', $movie, '/similar', $params);
    }

    public function getPopular(array $params = null)
    {
        return $this->client->createRequest('movie/', null, 'popular', $params);
    }

    public function getTopRated(array $params = null)
    {
        return $this->client->createRequest('movie/', null, 'top_rated', $params);
    }

    public function getUpcoming(array $params = null)
    {
        return $this->client->createRequest('movie/', null, 'upcoming', $params);
    }

    public function getNowPlaying(array $params = null)
    {
        return $this->client->createRequest('movie/', null, 'now_playing', $params);
    }

    public function getDiscover(array $params = null)
    {
        return $this->client->createRequest('discover/movie/', null, null, $params);
    }

}