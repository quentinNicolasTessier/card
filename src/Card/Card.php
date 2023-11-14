<?php

namespace App\Card;

class Card
{
    private array $color;
    private array $values;



    public function __construct(){
        $this->color=['Carreaux','Coeur','Pique','Trefle'];
        $this->values=['As','2','3','4','5','6','7','8','9','10','Valet','Dame','Roi'];
    }

    public function getColor(): array
    {
        return $this->color;
    }

    public function getValues(): array
    {
        return $this->values;
    }


}