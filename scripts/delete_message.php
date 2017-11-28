#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\Entities\Message;
use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$deleteMessageCommand = new Commando\Command();

$deleteMessageCommand->argument()
    ->referredToAs('id')
    ->required()
    ->describedAs('Message id, e.g. 42');

$deleteMessageCommand->flag('f')
    ->alias('force')
    ->describedAs('Don\'t ask for permission to delete')
    ->boolean();

$deleteMessageCommand->useDefaultHelp();

$messageRepository = EntityManager::instance()->getRepository(Message::class);

$messageId = $deleteMessageCommand[0];

/** @var Message $message */
$message = $messageRepository->find($messageId);
$oldText = $message->getText();

if (!$deleteMessageCommand['force']) {
    $yesNo = readline(sprintf("Delete message '%s' with id %d? (y/N) ", $oldText, $messageId));
    if ('y' !== strtolower($yesNo)) {
        exit(0);
    }
}

EntityManager::instance()->remove($message);
EntityManager::instance()->flush();

printf("Deleted message with id %d and text '%s'\n", $messageId, $oldText);
