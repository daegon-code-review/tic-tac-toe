<?php

use PHPUnit\Framework\TestCase;
use TicTacToe\Game;

final class GameTest extends TestCase
{
    /**
     * @dataProvider newGameProvider
     */
    public function testCanAddExactlyTwoPlayers(Game $game)
    {
        $game->addPlayer('first');
    }

    public function newGameProvider()
    {
        return [
            [new Game()]
        ];
    }
}
