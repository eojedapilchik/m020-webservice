<?php

namespace App\Repository;

use Symfony\Contracts\HttpClient\ResponseInterface;

interface HttpClientInterface
{

    /**
     * @param array $options
     * @return ResponseInterface
     */
    public function request( array $options): ResponseInterface;
}
