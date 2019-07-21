<?php

namespace TicTacToe\Action;

use Doctrine\ORM\EntityManager;
use TicTacToe\Model\Game;

abstract class Action
{
    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var Game
     */
    protected $game;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }

    final protected function findGame($id): Game
    {
        return $this->em->getRepository(Game::class)->find($id);
    }

    final protected function storeGame(Game $game)
    {
        $this->em->persist($game);
        $this->em->flush();
    }
}
