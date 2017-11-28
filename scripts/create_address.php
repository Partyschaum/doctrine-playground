#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$createNewAddressCommand = new Commando\Command();

$createNewAddressCommand->option('s')
    ->alias('street')
    ->referredToAs('street')
    ->required();

$createNewAddressCommand->option('n')
    ->alias('house-number')
    ->referredToAs('house number')
    ->required();

$createNewAddressCommand->option('p')
    ->alias('postal-code')
    ->referredToAs('postal code')
    ->required();

$createNewAddressCommand->option('c')
    ->alias('city')
    ->referredToAs('city')
    ->required();

$createNewAddressCommand->option('g')
    ->alias('country')
    ->referredToAs('country')
    ->required();

$createNewAddressCommand->useDefaultHelp();

$address = new \Partyschaum\DoctrinePlayground\Entities\Address(
    $createNewAddressCommand['street'],
    $createNewAddressCommand['house-number'],
    $createNewAddressCommand['postal-code'],
    $createNewAddressCommand['city'],
    $createNewAddressCommand['country']
);

EntityManager::instance()->persist($address);
EntityManager::instance()->flush();

printf(
    "Created address with id '%d':\nStreet: %s %s\nPostal Code: %s\nCity: %s\nCountry: %s\n",
    $address->getId(),
    $address->getStreet(),
    $address->getHouseNumber(),
    $address->getPostalCode(),
    $address->getCity(),
    $address->getCountry()
);
