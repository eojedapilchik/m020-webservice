<?php

namespace App\Controller\Api;

use App\Service\GetBeerDetails;
use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

final class BeerDetailsGetController extends  AbstractController
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }


    /**
     * @Rest\Get(path="/beers/{id}")
     * @Rest\View(serializerGroups={"beer_details"}, serializerEnableMaxDepthChecks=true)
     */
    public function show(Request $request, string $id, GetBeerDetails $getBeerDetails)
    {
        $this->logger->info(sprintf('BeerById Called with %s', $id));

        if (empty($id)) {
            return View::create('Id of Beer cannot be empty', Response::HTTP_BAD_REQUEST);
        }

        $json =($getBeerDetails)($id);
        return View::create($json);

    }

}