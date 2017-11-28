<?php

namespace Partyschaum\DoctrinePlayground\Entities;

class Address
{
    /** @var int */
    private $id;

    /** @var string */
    private $street;

    /** @var string */
    private $houseNumber;

    /** @var string */
    private $postalCode;

    /** @var string */
    private $country;

    /** @var string */
    private $city;

    public function __construct(string $street, string $houseNumber, string $postalCode, string $city, string $country)
    {
        $this->street = $street;
        $this->houseNumber = $houseNumber;
        $this->postalCode = $postalCode;
        $this->country = $country;
        $this->city = $city;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id)
    {
        $this->id = $id;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function setStreet(string $street)
    {
        $this->street = $street;
    }

    public function getHouseNumber(): string
    {
        return $this->houseNumber;
    }

    public function setHouseNumber(string $houseNumber)
    {
        $this->houseNumber = $houseNumber;
    }

    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode)
    {
        $this->postalCode = $postalCode;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function setCountry(string $country)
    {
        $this->country = $country;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }
}
