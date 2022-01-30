<?php

namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class BeerDetailsControllerTest extends WebTestCase
{
    // ...

    public function testGetBeerDetailReturnsResponse200()
    {
        $client = static::createClient();

        $client->request('GET', '/api/beers/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $this->assertResponseIsSuccessful();

    }

    public function testGetBeerDetailsReturnsResponse400BadRequestWrongURI()
    {
        $client = static::createClient();

        $client->request('GET', '/api/beer/1');

        $this->assertResponseStatusCodeSame(404);

    }

    public function testGetBeerDetailsReturnsResponse404WithNoID()
    {
        $client = static::createClient();

        $client->request('GET', '/api/beer/');

        $this->assertResponseStatusCodeSame(404);

    }
}