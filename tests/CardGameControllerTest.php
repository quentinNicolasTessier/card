<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class CardGameControllerTest extends WebTestCase
{
    /**
     * @return void
     * @test
     */
    public function helloWorldTest(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertResponseIsSuccessful();
    }

    /**
     * @return void
     * @test
     */
    public function titleTest(){
        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertSelectorTextContains('h1','Jeu de Carte');
    }


}