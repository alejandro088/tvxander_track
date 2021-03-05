<?php

namespace App\Services\TvXanderTmdb\Repositories;

class PeopleRepository extends GenericRepository
{
    public function getPerson($person, array $params = null)
    {
        return $this->client->createRequest('person/', $person, null, $params);
    }
}