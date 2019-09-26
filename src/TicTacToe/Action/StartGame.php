<?php

namespace App\TicTacToe\Action;

use App\TicTacToe\Model\Game;

class StartGame extends Action
{
    public function execute()
    {
        $game = new Game();

        $this->storeGame($game);

        return $game->getId();
    }
}
