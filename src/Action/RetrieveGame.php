<?php

namespace TicTacToe\Action;

class RetrieveGame extends Action
{
    public function execute($id)
    {
        return $this->findGame($id);
    }
}
