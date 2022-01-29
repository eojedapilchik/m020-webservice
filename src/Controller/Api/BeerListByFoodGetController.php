<?php

namespace App\Controller\Api;

use Psr\Log\LoggerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
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
     * @Rest\View(serializerGroups={"beer"}, serializerEnableMaxDepthChecks=true)
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