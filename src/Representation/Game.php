<?php

namespace TicTacToe\Representation;

use TicTacToe\Model\Game as GameModel;

// todo or GameRepresentation

class Game
{
    /**
     * @var string
     */
    public $id;

    /**
     * @var string[]
     */
    public $players;

    /**
     * @var int|null
     */
    public $winner;

    public function __construct(GameModel $game)
    {
        $this->id = $game->getId();
        $this->players = $game->getPlayers();
        $this->winner = $game->getWinner();
        $this->field = new Field($game->getField());
    }
}
