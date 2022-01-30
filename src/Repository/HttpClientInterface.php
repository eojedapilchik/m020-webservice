<?php

namespace App\Repository;

use Symfony\Contracts\HttpClient\ResponseInterface;
use App\Model\Exception\HttpRequestException;

interface HttpClientInterface
{

    /**
     * @param string $method
     * @param string|null $url_suffix
     * @param array $options
     * @return ResponseInterface
     * @throws HttpRequestException
     */
    public function request(string $method, ?string $url_suffix, array $options): ResponseInterface;
}
