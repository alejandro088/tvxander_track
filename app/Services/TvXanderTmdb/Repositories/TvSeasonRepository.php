<?php

namespace App\Services\TvXanderTmdb\Repositories;

class TvSeasonRepository extends GenericRepository
{

    public function getSeason($tv, $numberSeason, array $params = null)
    {
        return $this->client->createRequest('tv/', $tv, '/season/'.$numberSeason ,$params);
    }
}