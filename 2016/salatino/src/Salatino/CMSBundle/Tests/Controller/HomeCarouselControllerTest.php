<?php

namespace Salatino\CMSBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomeCarouselControllerTest extends WebTestCase
{
    public function testList()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'admin/home-carousel/list');
    }

    public function testEdit()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', 'admin/home-carousel/edit');
    }

}
