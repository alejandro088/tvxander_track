<?php

namespace App\Services\TvXanderTmdb;

use GuzzleHttp\Psr7\Request;

class Client {

    Const BASE_URL = 'https://api.themoviedb.org/3/';

    Const API_KEY = '7d637f29355aba225bd62d7af21d38d5';

    public function createRequest($path_url, $attribute = '', $collection = null, array $params = null)
    {
        $query = isset($params) ? '&' . http_build_query($params) : null;

        $client = new \GuzzleHttp\Client(['base_uri' => Client::BASE_URL]);
        
        $response = $client->get($path_url . $attribute . $collection  . '?api_key=' . Client::API_KEY . $query);

        $body = $response->getBody();

        return json_decode($body->getContents());
    }


}