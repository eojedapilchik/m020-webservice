<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

final class BeerListByFoodGetController extends  AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Route("/beers",  methods={"GET"}, name="beer_by_food_get")
     */
    public function list(Request $request):Response{
        $food = $request->get('food');
        $response = new JsonResponse();
        $this->logger->info(sprintf('BeerByFood Called with %s', $food));
        if (empty($food)) {
            $response->setData([
                'success' => false,
                'error' => 'Food cannot beempty',
                'data' => null
            ]);
        } else {
            $response->setData([
                    'beer-details' => 'ok',
                    'food' => $food
            ]);
        }
        return $response;

    }

}