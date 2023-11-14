<?php

namespace App\Controller;

use App\Card\Card;
use App\Service\CardService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GameCardController extends AbstractController
{
    #[Route('/', name: 'app_game_card')]
    public function index(CardService $cardService): Response
    {
        $card=new Card();
        $game=$cardService->gameCreator($card);
        $shuffleGame=$cardService->shuffleGame($game);
        $sliceGame=$cardService->slicedGame($shuffleGame);
        $sortedGame=$cardService->sortedGame($sliceGame,$card);
        return $this->render('game_card/index.html.twig',[
            'game'=>$sliceGame,
            'sorted'=>$sortedGame
        ]);
    }
}
