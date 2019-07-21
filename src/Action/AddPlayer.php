<?php

namespace TicTacToe\Action;

class AddPlayer extends Action
{
    public function execute($id, $player)
    {
        $game = $this->findGame($id);

        $game->addPlayer($player);

        $this->storeGame($game);
    }
}
