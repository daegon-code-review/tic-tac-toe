<?php

namespace TicTacToe;

class Game
{
    /**
     * @var array
     */
    protected $players = [];

    /**
     * @var Rules
     */
    protected $rules;

    public function __construct()
    {
        $this->rules = new Rules($this);
    }

    public function addPlayer(string $name): void
    {
        $this->rules->assertCanAddPlayer();
        $this->players[] = $name;
    }

    public function getPlayers(): array
    {
        return $this->players;
    }
}
