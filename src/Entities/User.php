<?php

namespace Partyschaum\DoctrinePlayground\Entities;

class User
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    /** @var Address */
    private $address;

    public function __construct(string $name, Address $address)
    {
        $this->name = $name;
        $this->address = $address;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getAddress(): Address
    {
        return $this->address;
    }

    public function setAddress(Address $address)
    {
        $this->address = $address;
    }
}
