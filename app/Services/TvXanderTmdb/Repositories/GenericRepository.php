<?php

namespace App\Services\TvXanderTmdb\Repositories;

class GenericRepository
{
    protected $client;

    public function __construct($client)
    {
        $this->client = $client;
    }
}