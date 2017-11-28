<?php

namespace Partyschaum\DoctrinePlayground;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager as DoctrineEntityManager;

class EntityManager
{
    /** @var \Doctrine\ORM\EntityManager */
    private static $instance;

    /** @var EntityManagerConfiguration */
    private static $configuration;

    public static function configure(EntityManagerConfiguration $configuration): void
    {
        static::$configuration = $configuration;
    }

    public static function instance(EntityManagerConfiguration $configuration = null): DoctrineEntityManager
    {
        if ($configuration && static::$instance) {
            throw new \RuntimeException('There already is a configured EntityManger instance!');
        }
        if (null === static::$instance) {
            static::$instance = static::create($configuration);
        }
        return static::$instance;
    }

    private static function create(EntityManagerConfiguration $configuration = null): DoctrineEntityManager
    {
        if (null === static::$configuration && null === $configuration) {
            throw new \RuntimeException('No EntityManagerConfiguration found!');
        }

        $configuration = $configuration ? $configuration : static::$configuration;

        return DoctrineEntityManager::create(
            $configuration->dbParams(),
            Setup::createXMLMetadataConfiguration(
                $configuration->xmlMappings(),
                $configuration->isDevMode()
            )
        );
    }
}
