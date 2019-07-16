<?php

namespace TicTacToe;

class Game
{
    protected $players = [];

    public function addPlayer(string $name)
    {
        $this->players[] = $name;
    }
}
