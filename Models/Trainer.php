<?php

class Trainer {
    private $idTrainer;
    private $name;
    private $surname;


    public function __construct(
        int $idTrainer,
        string $name,
        string $surname
    ) {
        $this->idTrainer = $idTrainer;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * @return int
     */
    public function getIdTrainer(): int
    {
        return $this->idTrainer;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }


}