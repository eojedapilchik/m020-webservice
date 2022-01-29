<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BeerByFoodGetController extends  AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    public function __invoke(Request $request):Response{
        $this->logger->info('HealthCheck endpoint called');
        return new JsonResponse(
            [
                'beer-details' => 'ok'
            ]
        );

    }

    public function getBookByFood()
    {
        return true;
    }
}