<?php

use Partyschaum\DoctrinePlayground\EntityManager;

require_once __DIR__ . '/bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet(
    EntityManager::instance()
);
