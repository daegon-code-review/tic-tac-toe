<?php

namespace Action;

use TicTacToe\Action\RetrieveGame;
use TicTacToe\Action\StartGame;

final class StartGameTest extends ActionTestCase
{
    public function testStartGame()
    {
        $this->kernel->callAction(StartGame::class);

        $this->kernel->callAction(RetrieveGame::class);
    }
}
