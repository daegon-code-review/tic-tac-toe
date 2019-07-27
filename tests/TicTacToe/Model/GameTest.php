<?php

namespace Model;

use PHPUnit\Framework\TestCase;
use App\TicTacToe\Model\Game;
use App\TicTacToe\Model\Point;

final class GameTest extends TestCase
{
    /**
     * @dataProvider newGameProvider
     */
    public function testCanAddTwoPlayersWithDifferentNames(Game $game)
    {
        $game->addPlayer('first');

        $game->addPlayer('second');

        $this->assertEquals(['first', 'second'], $game->getPlayers());
    }

    /**
     * @dataProvider newGameProvider
     */
    public function testCannotAddPlayersWithTheSameName(Game $game)
    {
        $game->addPlayer('first');

        $this->expectExceptionMessage('Player already exists');

        $game->addPlayer('first');
    }

    /**
     * @dataProvider gameWithPlayersProvider
     */
    public function testCannotAddMoreThenTwoPlayers(Game $game)
    {
        $this->expectExceptionMessage('Only 2 players can be added');

        $game->addPlayer('third');
    }

    /**
     * @dataProvider gameWithPlayersProvider
     */
    public function testCanMakeMovesAndWin(Game $game)
    {
        $game->putMark('first', new Point(0, 0));
        $game->putMark('second', new Point(1, 0));

        $game->putMark('first', new Point(0, 1));
        $game->putMark('second', new Point(1, 1));

        $game->putMark('first', new Point(0, 2));

        $this->assertEquals('first', $game->getWinner());
    }

    /**
     * @dataProvider gameWithPlayersProvider
     */
    public function testCannotPutMarkAfterWin(Game $game)
    {
        $game->putMark('first', new Point(0, 0));
        $game->putMark('second', new Point(1, 0));

        $game->putMark('first', new Point(0, 1));
        $game->putMark('second', new Point(1, 1));

        $game->putMark('first', new Point(0, 2));

        $this->expectExceptionMessage('Game is over');
        $game->putMark('second', new Point(1, 2));
    }

    /**
     * @dataProvider gameWithPlayersProvider
     */
    public function testShouldSeeErrorWhenCoordinateIsMarked(Game $game)
    {
        $game->putMark('first', new Point(0, 0));

        $this->expectExceptionMessage('Point with desired coordinates already marked');
        $game->putMark('second', new Point(0, 0));
    }

    /**
     * @dataProvider gameWithPlayersProvider
     */
    public function testShouldSeeErrorWhenTurnIsWrong(Game $game)
    {
        $game->putMark('first', new Point(0, 0));

        $this->expectExceptionMessage('Player turn is wrong');
        $game->putMark('first', new Point(0, 1));
    }

    /**
     * @dataProvider gameWithPlayersProvider
     */
    public function testShouldSeeErrorWhenCoordinateIsWrong(Game $game)
    {
        $this->expectExceptionMessage('Invalid coordinate');
        $game->putMark('first', new Point(0, 10));
    }

    /**
     * @dataProvider gameWithPlayersProvider
     */
    public function testShouldSeeErrorWhenPlayerIsWrong(Game $game)
    {
        $this->expectExceptionMessage('Players does not exist');
        $game->putMark('first-wrong', new Point(0, 0));
    }

    public function newGameProvider()
    {
        return [
            [new Game()]
        ];
    }

    public function gameWithPlayersProvider()
    {
        $game = new Game();
        $game->addPlayer('first');
        $game->addPlayer('second');

        return [
            [$game]
        ];
    }
}
