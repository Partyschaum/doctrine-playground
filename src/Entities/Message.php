<?php

namespace Partyschaum\DoctrinePlayground\Entities;


class Message
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $text;

    /**
     * @var \DateTime
     */
    private $postedAt;

    public function __construct(string $text, \DateTimeImmutable $postedAt)
    {
        $this->text = $text;
        $this->postedAt = $postedAt;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function getPostedAt(): \DateTimeImmutable
    {
        return $this->postedAt;
    }

    public function setPostedAt(\DateTimeImmutable $postedAt): void
    {
        $this->postedAt = $postedAt;
    }
}
