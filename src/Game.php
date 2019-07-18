<?php

namespace TicTacToe;

class Game
{
    /**
     * @var array
     */
    protected $players = [];

    /**
     * @var GameField
     */
    protected $field;

    /**
     * @var string
     */
    protected $lastMarkPlayer;

    public function __construct()
    {
        $this->field = new GameField();
    }

    public function addPlayer(string $name): void
    {
        $this->assertCanAddPlayer($name);
        $this->players[] = $name;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }

    public function getField(): GameField
    {
        return $this->field;
    }

    public function putMark($player, Point $coordinate): void
    {
        $this->assertCanPutMark($player, $coordinate);
        $this->lastMarkPlayer = $player;

        $this->field->putMark($coordinate, $this->getPlayerMark($player));
    }

    public function getPlayerMark($player)
    {
        return array_search($player, $this->players);
    }

    public function getWinner()
    {
        $mark = $this->field->getWinnerMark();

        if ($mark === null) {
            return null;
        }

        return $this->players[$mark];
    }

    protected function assertCanAddPlayer($playerName): void
    {
        if (count($this->players) >= 2) {
            throw new \LogicException('Only 2 players can be added');
        }

        if ($this->getPlayerMark($playerName) !== false) {
            throw new \LogicException('Player already exists');
        }
    }

    protected function assertCanPutMark($playerName, Point $coordinate): void
    {
        if (count($this->players) !== 2) {
            throw new \LogicException('Players should be registered first');
        }

        if ($this->getPlayerMark($playerName) === false) {
            throw new \LogicException('Players does not exist');
        }

        if ($this->lastMarkPlayer === $playerName) {
            throw new \LogicException('Player turn is wrong');
        }

        if ($this->field->getMark($coordinate) !== null) {
            throw new \LogicException('Point with desired coordinates already marked');
        }

        if ($this->field->getWinnerMark() !== null) {
            throw new \LogicException('Game is over');
        }
    }
}
