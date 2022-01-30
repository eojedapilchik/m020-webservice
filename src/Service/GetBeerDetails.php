<?php

namespace App\Service;

use App\Dto\GetBeerDetailsDTO;
use App\Dto\GetBeerDTO;
use App\Repository\HttpClientInterface;

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
        $json = json_decode($content, true);
        return new GetBeerDetailsDTO(
            $json['title'],
            $json['number_of_pages'],
            $json['publish_date']
        );

    }


}