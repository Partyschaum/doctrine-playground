#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\Entities\Address;
use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$addressRepository = EntityManager::instance()->getRepository(Address::class);

/** @var Address $address */
foreach ($addressRepository->findAll() as $address) {
    printf(
        "Address with id %d:\nStreet: %s %s\nPostal Code: %s\nCity: %s\nCountry: %s\n\n",
        $address->getId(),
        $address->getStreet(),
        $address->getHouseNumber(),
        $address->getPostalCode(),
        $address->getCity(),
        $address->getCountry()
    );
};

