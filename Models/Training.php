<?php
require_once 'Gym.php';
require_once 'Trainer.php';
class Training {
    private $idTrainig;
    private $ididGym;
    private $idParticipant;

    public function __construct(
        int $idTrainig,
        int $idGym,
        int $idTrainer)
    {
        $this->idTrainig = $idTrainig;
        $this->idGym = $idGym;
        $this->idTrainer = $idTrainer;
    }

    /**
     * @return int
     */
    public function getIdGym(): int
    {
        return $this->idGym;
    }

    /**
     * @return int
     */
    public function getIdTrainer(): int
    {
        return $this->idTrainer;
    }

    /**
     * @return int
     */
    public function getIdTrainig(): int
    {
        return $this->idTrainig;
    }

}