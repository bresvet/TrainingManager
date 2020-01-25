<?php

require_once 'AppController.php';
require_once __DIR__.'//..//Repository//TrainingRepository.php';
require_once __DIR__.'//..//Repository//UserRepository.php';

class TrainingController extends AppController {

    public function training()
    {
        $userRepository = new UserRepository();
        if (isset($_SESSION["id"])) {
            //zalogowany user
            $loggedID = $_SESSION["id"];

            $trainRespository = new TrainingRepository();
            $this->render('activities', ['results' =>$trainRespository->getActivities()]);

            return;
        }


        $this->render('activities');

    }

    public function yourtrainings()
    {
        $userRepository = new UserRepository();
        if (isset($_SESSION["id"])) {
            //zalogowany user
            $loggedID = $_SESSION["id"];

            $trainRespository = new TrainingRepository();
            $this->render('activities', ['results' =>$trainRespository->getYourTrainings($loggedID)]);
            return;
        }


        $this->render('activities');

    }

    public function signedup()
    {
        $userRepository = new UserRepository();
        if (isset($_SESSION["id"])) {
            $loggedID = $_SESSION["id"];

            $trainRespository = new TrainingRepository();
            $idActivity = $_GET['ids'];
            $trainRespository->signup($loggedID,$idActivity);
        }


        $this->render('signedup');

    }


}