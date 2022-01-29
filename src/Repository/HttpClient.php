<?php

namespace App\Repository;

use Symfony\Contracts\HttpClient\HttpClientInterface as SymfonyHttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpClient implements HttpClientInterface
{

    private $httpClient;

    public function __construct(SymfonyHttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function request( array $options = []): ResponseInterface
    {
        return $this->httpClient->request(
            'GET',
            "https://api.punkapi.com/v2/beers",
            $options
        );
    }
}