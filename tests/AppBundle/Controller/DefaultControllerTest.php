<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $this->markTestSkipped();
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('Welcome to Symfony', $crawler->filter('#container h1')->text());
    }


    public function test404Page()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/_error/404.html');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('PAGE NOT FOUND.', $crawler->filter('.error-divider h2')->text());
    }
}
