<?php

namespace App\Service;

use App\Repository\HttpClientInterface;

class GetBeerByFoodName
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function __invoke(string $food)
    {
        $response = $this->httpClient->request([
            'query' => [
                'food' => $food
            ]
        ]);

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            throw new Exception('Error getting beer');
        }

        $content = $response->getContent();

        return json_decode($content, true);

    }
}