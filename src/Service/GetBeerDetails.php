<?php

namespace App\Service;

use App\Dto\GetBeerDetailsDTO;
use App\Dto\GetBeerDTO;
use App\Repository\HttpClientInterface;
use Exception;

class GetBeerDetails
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function __invoke(string $id)
    {
        $response = $this->httpClient->request("GET", "/$id", []);

        $statusCode = $response->getStatusCode();

        if ($statusCode !== 200) {
            throw new Exception('Error getting beer');
        }

        $content = $response->getContent();
        $json = json_decode($content, true)[0];
        //return $json;
        return new GetBeerDetailsDTO(
            $json['id'],
            $json['name'],
            $json['description'],
            $json['tagline'],
            $json['image_url'],
            $json['first_brewed']
        );

    }


}