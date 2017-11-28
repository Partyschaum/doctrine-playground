<?php

use Partyschaum\DoctrinePlayground\EntityManager;
use Partyschaum\DoctrinePlayground\EntityManagerConfiguration;

define('PROJECT_ROOT', __DIR__);

EntityManager::configure(new EntityManagerConfiguration(
    [
        'driver' => 'pdo_sqlite',
        'path' => PROJECT_ROOT . '/db.sqlite',
    ],
    [
        PROJECT_ROOT . '/mappings'
    ],
    true
));
