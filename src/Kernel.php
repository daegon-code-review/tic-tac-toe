<?php

namespace TicTacToe;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use TicTacToe\Application\GameClient;

class Kernel
{
    /**
     * @var EntityManager
     */
    protected $entityManager;

    /**
     * @var string
     */
    protected $environment;

    public function __construct($options = [])
    {
        $this->environment = $this->getOption($options, 'environment');

        $this->setupEntityManager();
    }

    // todo no DI packages required for now
    public function callAction($actionClass, ...$payload)
    {
        $action = new $actionClass($this->entityManager);

        return $action->execute(...$payload);
    }

    public function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

    protected function setupEntityManager(): void
    {
        $isDevMode = in_array($this->environment, ['dev', 'test']);
        $config = Setup::createXMLMetadataConfiguration([__DIR__ . '/../config'], $isDevMode);

        // database configuration parameters
        $conn = [
            'driver' => 'pdo_sqlite',
            'path' => __DIR__ . "/../db.{$this->environment}.sqlite",
        ];

        // obtaining the entity manager
        $this->entityManager = EntityManager::create($conn, $config);
    }

    protected function getOption($options, $key, $default = null)
    {
        return isset($options[$key]) ? $options[$key] : $default;
    }
}
