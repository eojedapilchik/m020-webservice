<?php

namespace App\Repository;

use Symfony\Contracts\HttpClient\HttpClientInterface as SymfonyHttpClientInterface;
use Symfony\Contracts\HttpClient\ResponseInterface;

class HttpClient implements HttpClientInterface
{

    private const URI = "https://api.punkapi.com/v2/beers";
    private const METHOD = "GET";
    private $httpClient;

    public function __construct(SymfonyHttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function request(string $method = self::METHOD, ?string $url_suffix , array $options = []): ResponseInterface
    {
        return $this->httpClient->request(
            $method,
            self::URI . $url_suffix,
            $options
        );
    }
}