<?php

namespace TicTacToe;

class Rules
{
    /**
     * @var Game
     */
    protected $game;

    public function __construct(Game $game)
    {
        $this->game = $game;
    }

    public function assertCanAddPlayer(): void
    {
        if (count($this->game->getPlayers()) >= 2) {
            throw new \LogicException('Only 2 players can be added');
        }
    }
}
