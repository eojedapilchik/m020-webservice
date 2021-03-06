<?php

namespace App\Controller\Api;

use App\Service\GetBeerByFoodName;
use Psr\Log\LoggerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class BeerListByFoodGetController extends  AbstractFOSRestController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @Rest\Get(path="/beers")
     * @Rest\View(serializerGroups={"beer_list_response"}, serializerEnableMaxDepthChecks=true)
     */
    public function list(Request $request, GetBeerByFoodName $getBeerByFoodName)
    {
        $food = $request->get('food', null);
        $this->logger->info(sprintf('BeerByFood Called with %s', $food));

        if (empty($food)) {
            return View::create('Food name cannot be empty', Response::HTTP_BAD_REQUEST);
        }

        $json =($getBeerByFoodName)($food);
        return View::create($json);
    }

}