<?php

namespace App\Tests\TicTacToe\Action;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class ActionTestCase extends WebTestCase
{
    protected function setUp(): void
    {
        self::bootKernel();

        $this->getEntityManager()
            ->getConnection()
            ->executeQuery('DELETE FROM game');
    }

    protected function getEntityManager(): EntityManager
    {
        return self::$container->get('doctrine.orm.entity_manager');
    }
}
