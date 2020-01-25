
<?php
require_once 'Address.php';

class Gym {
    private $idGym;
    private $address;
    private $name;

    public function __construct(
        int $idGym,
        Address $address,
        string $name)
    {
        $this->idGym = $idGym;
        $this->address = $address;
        $this->name= $name;

    }

    /**
     * @return int
     */
    public function getIdGym(): int
    {
        return $this->idGym;
    }

    /**
     * @return Address
     */
    public function getAddress(): Address
    {
        return $this->address;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }



}