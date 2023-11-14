<?php

namespace App\Service;

use App\Card\Card;

class CardService
{
    private $card;
    public function gameCreator (Card $card){
        $game=[];
        foreach ($card->getColor() as $color){
            foreach ($card->getValues() as $value){
                array_push($game,['couleur'=>$color,'valeur'=>$value]);
            }

        }
        return $game;
    }

    public function shuffleGame(array $cardGame){
        shuffle($cardGame);
        return $cardGame;
    }

    public function slicedGame(array $cardGame){
        return array_slice($cardGame,0,10);
    }

    public function sortedGame($cardGame,Card $card){
        $this->card=$card;
        usort($cardGame, function ($a, $b) {
            // Triez d'abord par couleur
            $cmp = strcmp($a['couleur'], $b['couleur']);
            if ($cmp === 0) {
                // Si les couleurs sont les mêmes, triez par valeur
                $indexA = array_search($a['valeur'], $this->card->getValues());
                $indexB = array_search($b['valeur'], $this->card->getValues());
                if ($indexA < $indexB) {
                    return -1;
                } else {
                    if ($indexA > $indexB) {
                        return 1;
                    } else {
                        return 0;
                    }
                }
            }
            return $cmp;
        });
        return $cardGame;
    }



}