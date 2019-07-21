<?php

namespace Action;

use PHPUnit\Framework\TestCase;
use TicTacToe\Kernel;

abstract class ActionTestCase extends TestCase
{
    /**
     * @var Kernel
     */
    protected $kernel;

    protected function setUp(): void
    {
        $this->kernel = new Kernel();
        $this->kernel->getEntityManager()->getConnection()->executeQuery('TRUNCATE game');
    }
}
