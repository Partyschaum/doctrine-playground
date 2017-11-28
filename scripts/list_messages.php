#!/usr/bin/env php
<?php

use Partyschaum\DoctrinePlayground\Entities\Message;
use Partyschaum\DoctrinePlayground\EntityManager;

require_once dirname(__DIR__) . '/bootstrap.php';

$messageRepository = EntityManager::instance()->getRepository(Message::class);

/** @var Message $message */
foreach ($messageRepository->findAll() as $message) {
    printf("ID: %d, Message: '%s'\n", $message->getId(), $message->getText());
};

