#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\Entities\Address;
use Partyschaum\DoctrinePlayground\Entities\User;
use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$createNewUserCommand = new Commando\Command();

$createNewUserCommand->argument()
    ->alias('username')
    ->referredToAs('username')
    ->required();

$createNewUserCommand->option('a')
    ->alias('address-id')
    ->referredToAs('address-id')
    ->required();

$createNewUserCommand->useDefaultHelp();

$addressRepository = EntityManager::instance()->getRepository(Address::class);

/** @var Address $address */
$address = $addressRepository->find($createNewUserCommand['address-id']);

$user = new User(
    $createNewUserCommand['username'],
    $address
);

EntityManager::instance()->persist($user);
EntityManager::instance()->flush();

printf(
    "Created user with id %d and name '%s'\n",
    $user->getId(),
    $user->getName()
);
