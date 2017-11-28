#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\Entities\Address;
use Partyschaum\DoctrinePlayground\Entities\User;
use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$userRepository = EntityManager::instance()->getRepository(User::class);

/** @var User $user */
foreach ($userRepository->findAll() as $user) {
    printf(
        "User with id %d and name '%s' and street '%s'\n",
        $user->getId(),
        $user->getName(),
        $user->getAddress()->getCountry()
    );
};

