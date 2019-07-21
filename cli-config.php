<?php

require_once 'vendor/autoload.php';

$kernel = new \TicTacToe\Kernel([
    'environment' => getenv('ENVIRONMENT')
]);

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($kernel->getEntityManager());
