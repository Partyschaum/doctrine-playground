#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\Entities\Message;
use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$createNewMessageCommand = new Commando\Command();

$createNewMessageCommand->argument()
    ->referredToAs('message')
    ->require()
    ->describedAs('Message text, e.g. "This is a message!"');

$createNewMessageCommand->option('p')
    ->alias('posted-at')
    ->referredToAs('posted at date')
    ->describedAs('Post date of the message, e.g. \'2017-10-18\'')
    ->default(null);

$createNewMessageCommand->useDefaultHelp();

$messageText = $createNewMessageCommand[0];

$newMessage = new Message(
        $messageText,
        new DateTimeImmutable($createNewMessageCommand['posted-at'])
);

EntityManager::instance()->persist($newMessage);
EntityManager::instance()->flush();

printf("Created message '%s' with id '%s'\n", $messageText, $newMessage->getId());
