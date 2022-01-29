<?php

namespace App\Controller\Api;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


final class BeerDetailsGetController extends  AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/beers/{name}",  methods={"GET"}, requirements={"food"="\w+"}), name="beer_by_name")
     */
    public function show(Request $request, $name):Response{
        $this->logger->info(sprintf('BeerByName Called with %s', name));
        return new JsonResponse(
            [
                'beer-details' => 'ok',
                'food' => $food
            ]
        );

    }

}