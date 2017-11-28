#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\Entities\Message;
use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$updateMessageCommand = new Commando\Command();

$updateMessageCommand->argument()
    ->referredToAs('id')
    ->required()
    ->describedAs('Message id, e.g. 42');

$updateMessageCommand->argument()
    ->referredToAs('new message text')
    ->required()
    ->describedAs('New text of the message, e.g. "Yet another text');

$updateMessageCommand->useDefaultHelp();

$messageRepository = EntityManager::instance()->getRepository(Message::class);

$messageId = $updateMessageCommand[0];
$newText = $updateMessageCommand[1];

/** @var Message $message */
$message = $messageRepository->find($messageId);
$oldText = $message->getText();
$message->setText($newText);

EntityManager::instance()->flush();

printf("Updated message with id %d from '%s' to '%s'\n", $message->getId(), $oldText, $newText);
