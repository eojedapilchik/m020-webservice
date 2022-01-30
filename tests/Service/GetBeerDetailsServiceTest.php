<?php

namespace App\Tests\Service;

use App\Repository\HttpClient;
use App\Service\GetBeerDetails;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class GetBeerDetailsServiceTest extends KernelTestCase
{

    private $getBeerDetailsService;

    protected function setUp(): void
    {
        // (1) booting the Symfony kernel
        self::bootKernel();

        // (2) use static::getContainer() to access the service container
        $container = static::getContainer();

        // (3) run some service & test the result
        $httpClientGenerator = $container->get(HttpClient::class);

        $this->getBeerDetailsService = new GetBeerDetails($httpClientGenerator);
    }

    public function testGetBeerDetailsForIDreturnsCorrectValues()
    {
        $response = ($this->getBeerDetailsService)(1);

        $this->assertEquals($response->getTagline(), "A Real Bitter Experience.");
        $this->assertEquals($response->getImageUrl(), "https://images.punkapi.com/v2/keg.png");
        $this->assertEquals($response->getFirstBrewed(),  "09/2007");
        $this->assertEquals($response->getId(), "1");
        $this->assertEquals($response->getName(), "Buzz");
        $this->assertEquals($response->getDescription(), "A light, crisp and bitter IPA brewed with English and American hops. A small batch brewed only once.");


    }
}


