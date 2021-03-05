<?php

namespace App\Services\TvXanderTmdb\Repositories;

class SearchRepository extends GenericRepository
{

    protected $query;

    public function searchMovie($query, array $params = null)
    {
        $this->query = $params;    
        
        $this->query = array_merge($this->query, ['query' => $query]);

        return $this->client->createRequest('search/movie/', null, null, $this->query);
    }

    public function searchTv($query, array $params = null)
    {
        $this->query = $params;    
        
        $this->query = array_merge($this->query, ['query' => $query]);

        return $this->client->createRequest('search/tv/', null, null, $this->query);
    }

    public function searchPerson($query, array $params = null)
    {
        $this->query = $params;    
        
        $this->query = array_merge($this->query, ['query' => $query]);

        return $this->client->createRequest('search/person/', null, null, $this->query);
    }

    public function searchCompany($query, array $params = null)
    {
        $this->query = $params;    
        
        $this->query = array_merge($this->query, ['query' => $query]);

        return $this->client->createRequest('search/company', null, null, $this->query);
    }
}