<?php

namespace Tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    public function testNewAction()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/new');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(1, $crawler->filter('#address_book_firstName'));
        $this->assertCount(1, $crawler->filter('#address_book_lastName'));
        $this->assertCount(1, $crawler->filter('#address_book_country'));
        $this->assertCount(1, $crawler->filter('#address_book_zip'));
        $this->assertCount(1, $crawler->filter('#address_book_birthday'));
        $this->assertCount(1, $crawler->filter('#address_book_city'));
        $this->assertCount(1, $crawler->filter('#address_book_streetAndNumber'));
        $this->assertCount(1, $crawler->filter('#address_book_email'));
        $this->assertCount(1, $crawler->filter('#address_book_picture'));
    }

    public function test404Page()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/_error/404.html');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertContains('PAGE NOT FOUND.', $crawler->filter('.error-divider h2')->text());
    }
}
