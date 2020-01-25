<?php
require_once 'Gym.php';

class Activity {
    private $idActivity;
    private $date;
    private $type;
    private $gym;
    private $trainer;

    public function __construct(
        int $idActivity,
        Gym $gym,
        string $type,
        string $date,
        Trainer $trainer)
    {
        $this->idActivity = $idActivity;
        $this->gym = $gym;
        $this->type= $type;
        $this->date = $date;
        $this->trainer = $trainer;
    }

    /**
     * @return int
     */
    public function getIdActivity(): int
    {
        return $this->idActivity;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return Gym
     */
    public function getGym(): Gym
    {
        return $this->gym;
    }

    /**
     * @return Trainer
     */
    public function getTrainer(): Trainer
    {
        return $this->trainer;
    }


}