<?php

namespace App\Tests;

use App\Card\Card;
use App\Service\CardService;
use PHPUnit\Framework\TestCase;
use function PHPUnit\Framework\assertEquals;

class cardServiceTest extends TestCase
{
    /**
     * @return void
     * @test
     */
    public function cardGameCreateTest(){
        $card=new Card();
        $cardService=new CardService();
        $cardGame=$cardService->gameCreator($card);
        $this->assertIsArray($cardGame);
        $this->assertArrayHasKey('couleur',$cardGame[0]);
        $this->assertArrayHasKey('valeur',$cardGame[0]);
    }

    /**
     * @return void
     * @test
     */
    public function shuffleGameTest(){
        $card= new Card();
        $cardService=new CardService();
        $cardGame=$cardService->gameCreator($card);
        $shuffledGame=$cardService->shuffleGame($cardGame);
        $this->assertNotEquals($shuffledGame,$cardGame);
        $this->assertArrayHasKey('couleur',$shuffledGame[0]);
        $this->assertArrayHasKey('valeur',$shuffledGame[0]);

    }

    /**
     * @test
     */
    public function sliceGameTest(){
        $card= new Card();
        $cardService=new CardService();
        $cardGame=$cardService->gameCreator($card);
        $shuffledGame=$cardService->shuffleGame($cardGame);
        $slicedGame=$cardService->slicedGame($shuffledGame);
        $this->assertNotEquals($slicedGame,$shuffledGame);
        $this->assertCount(10,$slicedGame);
        $this->assertArrayHasKey('couleur',$slicedGame[0]);
        $this->assertArrayHasKey('valeur',$slicedGame[0]);
        $this->assertContains($shuffledGame[0],$slicedGame);
    }

    /**
     * @test
     */
    public function sortedGameTest(){
        $card= new Card();
        $cardService=new CardService();
        $cardGame=$cardService->gameCreator($card);
        $shuffledGame=$cardService->shuffleGame($cardGame);
        $slicedGame=$cardService->slicedGame($shuffledGame);
        $sortedGame=$cardService->sortedGame($slicedGame,$card);
        $this->assertNotEquals($sortedGame,$slicedGame);
        $this->assertCount(10,$sortedGame);
        $this->assertArrayHasKey('couleur',$sortedGame[0]);
        $this->assertArrayHasKey('valeur',$sortedGame[0]);
        $this->assertContains($slicedGame[0],$sortedGame);

    }
}