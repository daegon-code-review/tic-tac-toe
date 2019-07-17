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
        $game->addPlayer('second');

        $this->assertEquals(['first', 'second'], $game->getPlayers());

        $this->expectException(LogicException::class);

        $game->addPlayer('third');
    }

    public function newGameProvider()
    {
        return [
            [new Game()]
        ];
    }
}
