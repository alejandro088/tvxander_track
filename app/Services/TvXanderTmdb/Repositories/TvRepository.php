<?php

namespace App\Services\TvXanderTmdb\Repositories;

class TvRepository extends GenericRepository
{

    public function getTvShow($tv, array $params = null)
    {
        return $this->client->createRequest('tv/', $tv, null, $params);
    }

    public function getSimilar($tv, array $params = null)
    {
        return $this->client->createRequest('tv/', $tv, '/similar', $params);
    }

    public function getPopular(array $params = null)
    {
        return $this->client->createRequest('tv/', null, 'popular', $params);
    }

    public function getTopRated(array $params = null)
    {
        return $this->client->createRequest('tv/', null, 'top_rated', $params);
    }

    public function getOnTheAir(array $params = null)
    {
        return $this->client->createRequest('tv/', null, 'on_the_air', $params);
    }

    public function getAiringToday(array $params = null)
    {
        return $this->client->createRequest('tv/', null, 'airing_today', $params);
    }

    public function getDiscover(array $params = null)
    {
        return $this->client->createRequest('discover/tv/', null, null, $params);
    }
}