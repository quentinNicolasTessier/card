<?php

namespace App\Tests;

use App\Card\Card;
use phpDocumentor\Reflection\DocBlock\Tags\Method;
use PHPUnit\Framework\TestCase;

class cardTest extends TestCase
{
    /**
     * @test
     */
    public function cardTest(){
        $card=new Card();
        $this->assertNotNull($card);
    }

    /**
     * @test
     */
    public function cardColorTest(){
        $card=new Card();
        $color=['Carreaux','Coeur','Pique','Trefle'];
        $cardColors=$card->getColor();
        $this->assertEquals($color,$cardColors);
        $this->assertIsArray($cardColors);
        $this->assertContains($color[0],$cardColors);
        $this->assertCount(count($color),$cardColors);
    }

    /**
     * @test
     */
    public function cardValueTest(){
        $card=new Card();
        $values=['As','2','3','4','5','6','7','8','9','10','Valet','Dame','Roi'];
        $cardValues=$card->getValues();
        $this->assertEquals($values,$cardValues);
        $this->assertIsArray($cardValues);
        $this->assertContains($values[0],$cardValues);
        $this->assertCount(count($values),$cardValues);

    }
}