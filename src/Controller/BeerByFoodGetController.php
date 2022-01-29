<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


final class BeerByFoodGetController extends  AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/beer_by_food/{food}",  methods={"GET"}, requirements={"food"="\w+"}), name="beer_by_food_get")
     */
    public function list(Request $request, $food):Response{
        $this->logger->info(sprintf('BeerByFood Called with %s', $food));
        return new JsonResponse(
            [
                'beer-details' => 'ok',
                'food' => $food
            ]
        );

    }

}