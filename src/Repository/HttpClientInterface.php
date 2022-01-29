<?php

namespace App\Repository;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface HttpClientInterfaceRepository
{

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return ResponseInterface
     */
    public function request(string $method, string $url, array $options): ResponseInterface;
}
