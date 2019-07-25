<?php

namespace TicTacToe\Action;

use TicTacToe\Model\Game;
use TicTacToe\Model\Uuid;

class StartGame extends Action
{
    public function execute()
    {
        $game = new Game(new Uuid());

        $this->storeGame($game);

        return $game->getId();
    }
}
