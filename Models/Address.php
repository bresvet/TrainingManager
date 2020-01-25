<?php

class Address
{
    private $idAddress;
    private $city;
    private $street;
    private $code;

    public function __construct(
        int $idAddress,
        string $city,
        string $street,
        string $code)
    {
        $this->idAddress = $idAddress;
        $this->city = $city;
        $this->code = $code;
        $this->street = $street;
    }

    public function getIdAddress(): int
    {
        return $this->idAddress;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getStreet(): string
    {
        return $this->street;
    }

    public function getCode(): string
    {
        return $this->code;
    }

}
