<?php

require_once 'AppController.php';

class HomeController extends AppController {

    public function home()
    {
        $userRepository = new UserRepository();
        if (isset($_SESSION["id"])) {
            $loggedID = $_SESSION["id"];
            $name = $userRepository->loggedUser($loggedID)->getName();
            $this->render('home', ['messages' => ['Zalogowany jako '.$name]]);
            return;
        }


        $this->render('home');
    }
}