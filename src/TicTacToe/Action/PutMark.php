<?php

namespace App\TicTacToe\Action;

use App\TicTacToe\Model\Point;

class PutMark extends Action
{
    public function execute($id, $player, array $mark)
    {
        $game = $this->findGame($id);

        $game->putMark($player, Point::fromArray($mark));

        $this->storeGame($game);
    }
}
