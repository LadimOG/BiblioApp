<?php

namespace App\Services;

use GuzzleHttp\Client;

class GoogleBooksService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'https://www.googleapis.com/books/v1/',
            'timeout' => 5.0
        ]);
    }

    public function searchBooks(string $query)
    {
        $response = $this->client->request('GET', 'volumes', [
            'query' => ['q' => $query]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    public function getBookById(string $id)
    {
        $response = $this->client->request('GET', "volumes/{$id}");

        return json_decode($response->getBody()->getContents(), true);
    }
}
