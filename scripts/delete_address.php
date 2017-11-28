#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\Entities\Address;
use Partyschaum\DoctrinePlayground\Entities\Message;
use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$deleteAddressCommand = new Commando\Command();

$deleteAddressCommand->argument()
    ->referredToAs('id')
    ->required()
    ->describedAs('Address id, e.g. 42');

$deleteAddressCommand->flag('f')
    ->alias('force')
    ->describedAs('Don\'t ask for permission to delete')
    ->boolean();

$deleteAddressCommand->useDefaultHelp();

$addressRepository = EntityManager::instance()->getRepository(Address::class);

$addressId = $deleteAddressCommand[0];

/** @var Address $address */
$address = $addressRepository->find($addressId);

if (!$deleteAddressCommand['force']) {
    $yesNo = readline(sprintf("Delete address with id %d? (y/N) ", $addressId));
    if ('y' !== strtolower($yesNo)) {
        exit(0);
    }
}

EntityManager::instance()->remove($address);
EntityManager::instance()->flush();

printf("Deleted address with id %d\n", $addressId);
