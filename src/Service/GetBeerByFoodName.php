<?php

namespace App\Service;

use App\Dto\GetBeerDTO;
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
        $response = $this->httpClient->request(
            "GET",
            "",
            [
                'query' => [
                    'food' => $food
                ]
            ]
        );

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            throw new Exception('Error getting beer');
        }

        $content = $response->getContent();
        $json = json_decode($content, true);
        return array_map([$this, 'beerToDto'], $json);

    }

    private function beerToDto(array $beer)
    {
         return new GetBeerDTO(
            $beer['id'],
            $beer['name'],
            $beer['description']
        );

    }
}